<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Controller\Controller;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/5/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    use LocatorAwareTrait;
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');
         
        // Load your models
         $this->Students = $this->getTableLocator()->get('Students');
         $this->Activities = $this->getTableLocator()->get('Activities');
         $this->StudentMerits = $this->getTableLocator()->get('StudentMerits');
         $this->MeritLetterRequests = $this->getTableLocator()->get('MeritLetterRequests');

    }
    
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['display']);
    }

    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

       

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    // public function dashboard()
    public function dashboard()
    {
        $user = $this->request->getAttribute('identity');
    
    if (!$user) {
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
    
    if ($user->role === 'admin') {
        // Admin stats
        $studentCount = $this->fetchTable('Students')->find()->count();
        $meritCount = $this->fetchTable('Merits')->find()->count();
        $this->set(compact('studentCount', 'meritCount'));
        return $this->render('admin_dashboard');
    }
    
    return $this->render('user_dashboard');
    }

    //admin dashboard
    public function adminDashboard()
{
    // Initialize default values
    $studentCount = 0;
    $meritCount = 0;
    $activityCount = 0;
    $pendingRequests = 0;
    $recentActivities = [];

    $this->Students = $this->getTableLocator()->get('Students');
    $this->Activities = $this->getTableLocator()->get('Activities');
    $this->StudentMerits = $this->getTableLocator()->get('StudentMerits');
    $this->MeritLetterRequests = $this->getTableLocator()->get('MeritLetterRequests');

    try {
        // Dashboard statistics
        $studentCount = $this->Students->find()->count() ?? 0;
        $meritCount = $this->StudentMerits->find()->count() ?? 0;
        $activityCount = $this->Activities->find()->count() ?? 0;
        $pendingRequests = $this->MeritLetterRequests->find()
            ->where(['status' => 'pending'])
            ->count() ?? 0;

        // Recent activities
        $recentActivities = $this->Activities->find()
            ->order(['created' => 'DESC'])
            ->limit(5)
            ->all()
            ->toArray();

    } catch (\Exception $e) {
        $this->Flash->error('Error loading dashboard data.');
        $this->log($e->getMessage());
    }

    $this->set(compact('studentCount', 'meritCount', 'activityCount', 
                    'pendingRequests', 'recentActivities'));
}

public function userDashboard()
    {
        $user = $this->Authentication->getIdentity();

        if (!$user) {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        // Load data for the user dashboard
        // For example, fetch user-specific data
        $this->Students = $this->getTableLocator()->get('Students');
        $this->Activities = $this->getTableLocator()->get('Activities');
        $this->StudentMerits = $this->getTableLocator()->get('StudentMerits');
        $this->MeritLetterRequests = $this->getTableLocator()->get('MeritLetterRequests');

        $data = [
            'totalMerits' => $this->StudentMerits->find()
            ->where(['student_id' => $user->id])
            ->count(),
            'recentActivities' => $this->Activities->find()
            ->where(['merit_id' => $user->id])
            ->order(['created' => 'DESC'])
            ->limit(5)
            ->all(),
            'letterRequests' => $this->MeritLetterRequests->find()
            ->where(['user_id' => $user->id])
            ->order(['created' => 'DESC'])
            ->limit(3)
            ->all()
        ];

        $this->set(compact('user', 'data'));
    }



    
}
