<?php
declare(strict_types=1);



namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

class MeritLetterRequestsController extends AppController
{

    protected $MeritLetterRequests;
    protected $students;
    protected $StudentMerits;
    protected $Users;
    
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');

      
        // Get table instances using TableRegistry

        $this->MeritLetterRequests = TableRegistry::getTableLocator()->get('MeritLetterRequests');
        $this->Students = TableRegistry::getTableLocator()->get('Students');
        $this->StudentMerits = TableRegistry::getTableLocator()->get('StudentMerits');
        $this->Users = TableRegistry::getTableLocator()->get('Users');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        // Allow unauthenticated users to access the 'add' action
        // Adjust the method name based on your Authentication plugin version
        if (method_exists($this->Authentication, 'addUnauthenticatedActions')) {
            $this->Authentication->addUnauthenticatedActions(['add']);
        } else {
            $this->Authentication->allowUnauthenticated(['add']);
        }
    }

    // Users can submit a new merit letter request
    public function add()
    {
        $meritLetterRequest = $this->MeritLetterRequests->newEmptyEntity();
        if ($this->request->is('post')) {
            $meritLetterRequest = $this->MeritLetterRequests->patchEntity(
                $meritLetterRequest,
                $this->request->getData()
            );
            $user = $this->Authentication->getIdentity();
            $meritLetterRequest->user_id = $user->id;
            $meritLetterRequest->status = 'pending';

            if ($this->MeritLetterRequests->save($meritLetterRequest)) {
                $this->Flash->success('Your merit letter request has been submitted.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Unable to submit your letter request. Please try again.');
        }
        $this->set(compact('meritLetterRequest'));
    }

    // Users can view their own merit letter requests
    public function index()
    {
        $user = $this->Authentication->getIdentity();
        $meritLetterRequests = $this->MeritLetterRequests->find('all')
            ->where(['user_id' => $user->id])
            ->order(['created' => 'DESC']);
        $this->set(compact('meritLetterRequests'));
    }

    // Admins can view all merit letter requests
    public function adminIndex()
    {
        $this->authorizeAdmin();
        
        $query = $this->MeritLetterRequests->find()
            ->contain(['Users'])
            ->order(['MeritLetterRequests.created' => 'DESC']);
    
        $meritLetterRequests = $this->paginate($query);
        $this->set(compact('meritLetterRequests'));
    }

    // Admin can approve a merit letter request
    public function approve($id)
    {
        $this->authorizeAdmin();
        $meritLetterRequest = $this->MeritLetterRequests->get($id);
        $meritLetterRequest->status = 'approved';
        if ($this->MeritLetterRequests->save($meritLetterRequest)) { // Corrected variable name
            $this->Flash->success('The merit letter request has been approved.');
        } else {
            $this->Flash->error('Unable to approve the merit letter request. Please try again.');
        }
        return $this->redirect(['action' => 'adminIndex']);
    }

    // Admin can reject a merit letter request
    public function deny($id)
    {
        $this->authorizeAdmin();
        $meritLetterRequest = $this->MeritLetterRequests->get($id);
        $meritLetterRequest->status = 'denied';
        if ($this->MeritLetterRequests->save($meritLetterRequest)) { // Corrected variable name
            $this->Flash->success('The merit letter request has been denied.');
        } else {
            $this->Flash->error('Unable to deny the merit letter request. Please try again.');
        }
        return $this->redirect(['action' => 'adminIndex']);
    }

    // Users can download their merit letter if approved
    public function download($id)
    {
        $user = $this->Authentication->getIdentity();
        $meritLetterRequest = $this->MeritLetterRequests->get($id, [
            'contain' => ['Users'],
        ]);

        // Check authorization and status
        if ($meritLetterRequest->user_id !== $user->id || $meritLetterRequest->status != 'approved') {
            $this->Flash->error('You are not authorized to download this letter.');
            return $this->redirect(['action' => 'index']);
        }

        // Fetch student's merits
        $studentMerits = $this->StudentMerits->find()
            ->contain(['Merits', 'Students'])
            ->where(['StudentMerits.student_id' => $meritLetterRequest->student_id]);

        // Set variables for the view
        $this->set(compact('meritLetterRequest', 'studentMerits'));

        // Disable auto layout for PDF
        $this->viewBuilder()->enableAutoLayout(false);
        // Use the CakePdf view class
        $this->viewBuilder()->setClassName('CakePdf.Pdf');

        // Set the PDF filename
        $this->response = $this->response->withDownload('merit_letter.pdf');

        // Set the template path
        $this->viewBuilder()->setTemplatePath('MeritLetterRequests/pdf');
        $this->render('letter');
    }

    // Helper function to restrict admin actions
    private function authorizeAdmin()
    {
        $user = $this->Authentication->getIdentity();
        if ($user->role !== 'admin') {
            $this->Flash->error('You are not authorized to perform this action.');
            return $this->redirect(['/']);
        }
    }
}