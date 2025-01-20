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
        $this->Authorization->skipAuthorization(['display']);
    }

    public function display(string ...$path): ?Response
    {

        // skip authorization for display
        $this->Authorization->skipAuthorization();

        if (!$path) {
            return $this->redirect('/');
        }
       
        if ($path[0] === 'user_dashboard') {
            $user = $this->request->getAttribute('identity');
            if ($user) {

                //debug
                // Debug user information
            echo '<pre>';
            print_r($user);
            echo '</pre>';

                // Find student data based on user_id
                $student = $this->Students->find()
                ->where(['user_id' => $user->id])
                ->first();

                echo '<pre>';
                print_r($student);
                echo '</pre>';
            
            $this->set('student', $student);
            }
        }

       

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    // public function landing()
    public function landing()
    {
        $this->viewBuilder()->setLayout('landing');
        $this->Authorization->skipAuthorization();
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
        
        // Get student record
        $student = $this->fetchTable('Students')
            ->find()
            ->where(['user_id' => $user->id])
            ->first();
        
        if (!$student) {
            $this->Flash->error('Student record not found.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        // Get total merit points
        $totalMerits = $this->fetchTable('StudentMerits')
            ->find()
            ->where(['student_id' => $student->student_id])
            ->select(['total' => 'SUM(points)'])
            ->first();

        // Get activities count - distinct activities
        $activitiesCount = $this->fetchTable('StudentMerits')
            ->find()
            ->where(['student_id' => $student->student_id])
            ->group(['activity_id'])
            ->count();

        // Get merit distribution by type
        $meritDistribution = $this->fetchTable('StudentMerits')
            ->find()
            ->contain(['Merits'])
            ->where(['student_id' => $student->student_id])
            ->select([
                'merit_type' => 'Merits.merit_type',
                'total' => 'SUM(StudentMerits.points)'
            ])
            ->group('Merits.merit_type')
            ->all();

        // Prepare monthly progress data
        $monthlyProgress = $this->StudentMerits->find()
            ->select([
                'month' => 'MONTH(StudentMerits.created)',
                'total' => 'SUM(StudentMerits.points)'
            ])
            ->where(['StudentMerits.student_id' => $student->student_id])
            ->group(['MONTH(StudentMerits.created)'])
            ->order(['MONTH(StudentMerits.created)'])
            ->all()
            ->toArray();

        // If no data exists, create empty dataset
        if (empty($monthlyProgress)) {
            $monthlyProgress = array_map(function($month) {
                return [
                    'month' => date('F', mktime(0, 0, 0, $month, 1)),
                    'total' => 0
                ];
            }, range(1, 12));
        } else {
            // Format existing data
            foreach ($monthlyProgress as &$progress) {
                $progress['month'] = date('F', mktime(0, 0, 0, $progress['month'], 1));
                $progress['total'] = (int)$progress['total'];
            }
        }

        // Get recent merit history
        $recentMerits = $this->fetchTable('StudentMerits')
            ->find()
            ->contain(['Activities', 'Merits'])
            ->where(['student_id' => $student->student_id])
            ->order(['StudentMerits.created' => 'DESC'])
            ->limit(5)
            ->all();

        // Get latest activity
        $latestMerit = $this->fetchTable('StudentMerits')
            ->find()
            ->contain(['Activities'])
            ->where(['student_id' => $student->student_id])
            ->order(['StudentMerits.created' => 'DESC'])
            ->first();

        $this->set(compact('student', 'totalMerits', 'meritDistribution', 'activitiesCount',
                           'monthlyProgress', 'recentMerits', 'latestMerit'));
    }

    // achievements
    public function achievements()
    {
        $user = $this->Authentication->getIdentity();

        // Get student record
        $student = $this->fetchTable('Students')
            ->find()
            ->where(['user_id' => $user->id])
            ->first();

        if (!$student) {
            $this->Flash->error('Student record not found.');
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        // Get total merit points for achievements calculation
        $totalMerits = $this->fetchTable('StudentMerits')
        ->find()
        ->where(['student_id' => $student->student_id])
        ->select(['total' => 'SUM(points)'])
        ->first();

     $totalPoints = $totalMerits ? $totalMerits->total : 0;

     $this->set(compact('totalPoints'));
    }



    
}
