<?php
declare(strict_types=1);

namespace App\Controller;

class MeritLetterRequestsController extends AppController
{
    
    public function index()
    {
        $this->Authorization->skipAuthorization();
        // For regular users, show only their requests
        if ($this->Authentication->getIdentity()->get('role') !== 'admin') {
            $query = $this->MeritLetterRequests->find()
                ->where(['MeritLetterRequests.user_id' => $this->Authentication->getIdentity()->get('id')])
                ->contain(['Students', 'Users']);
        } else {
            $query = $this->MeritLetterRequests->find()
                ->contain(['Students', 'Users']);
        }
        $meritLetterRequests = $this->paginate($query);
        $this->set(compact('meritLetterRequests'));
    }

    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $meritLetterRequest = $this->MeritLetterRequests->get($id, contain: ['Students', 'Users']);
        $this->set('meritLetterRequest', $meritLetterRequest);
    }

    // download the merit letter
    public function pdf($id = null) {
        $this->viewBuilder()->enableAutoLayout(false);
        $meritLetterRequest = $this->MeritLetterRequests->get($id, contain: ['Students', 'Users']);
        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption('pdfConfig', [
            'orientation' => 'portrait',
            'download' => true,
            'filename' => 'MeritLetter_' . $meritLetterRequest->id . '.pdf'
        ]);
        $this->set(compact('meritLetterRequest'));
    }

    public function add()
    {
        $this->Authorization->skipAuthorization();
        $meritLetterRequest = $this->MeritLetterRequests->newEmptyEntity();
        
        // Get current user
        $user = $this->Authentication->getIdentity();
        
        // Get student record
        $student = $this->fetchTable('Students')
            ->find()
            ->where(['user_id' => $user->id])
            ->first();

        if (!$student) {
            $this->Flash->error(__('Student record not found.'));
            return $this->redirect(['controller' => 'Pages', 'action' => 'display', 'home']);
        }

        // Check if student already has a pending request
        $existingRequest = $this->MeritLetterRequests->find()
            ->where([
                'student_id' => $student->student_id,
                'status' => 'pending'
            ])
            ->first();

        if ($existingRequest) {
            $this->Flash->error(__('You already have a pending merit letter request.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('post')) {
            $data = [
                'student_id' => $student->student_id,
                'user_id' => $user->id,
                'status' => 'pending',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s')
            ];

            $meritLetterRequest = $this->MeritLetterRequests->patchEntity($meritLetterRequest, $data);
            
            if ($this->MeritLetterRequests->save($meritLetterRequest)) {
                $this->Flash->success(__('Your merit letter request has been submitted.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merit letter request could not be saved. Please, try again.'));
            // Debug information
            debug($meritLetterRequest->getErrors());
        }

        $this->set(compact('meritLetterRequest', 'student'));
    }

    // public function edit pending request - redundant as there is only user who they can choose, not much to edit.
    // public function edit($id = null) {
    //     $this->Authorization->skipAuthorization();
    //     $meritLetterRequest = $this->MeritLetterRequests->get($id, [
    //         'contain' => []
    //     ]);

    //     // Only allow editing of pending requests
    //     if ($meritLetterRequest->status !== 'pending') {
    //         $this->Flash->error(__('Only pending requests can be edited.'));
    //         return $this->redirect(['action' => 'index']);
    //     }

    //     if ($this->request->is(['patch','post', 'put'])) {
    //         $meritLetterRequest = $this->MeritLetterRequests->patchEntity($meritLetterRequest, $this->request->getData());
    //         if ($this->MeritLetterRequests->save($meritLetterRequest)) {
    //             $this->Flash->success(__('Your request has been updated.'));
    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('Unable to update your request. Please try again.'));
    //     }
    //     $this->Flash->error(__('The merit letter request could not be updated. Please, try again.'));
    // }

    // public function delete
    public function delete($id = null) {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $meritLetterRequest = $this->MeritLetterRequests->get($id);

        // Only allow deletion of pending requests
        if ($meritLetterRequest->status !== 'pending') {
            $this->Flash->error(__('Only pending requests can be deleted.'));
            return $this->redirect(['action' => 'index']);
        }

        if ($this->MeritLetterRequests->delete($meritLetterRequest)) {
            $this->Flash->success(__('The request has been deleted.'));
        } else {
            $this->Flash->error(__('Could not delete the request.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function adminIndex()
    {
        $this->Authorization->skipAuthorization();
        $query = $this->MeritLetterRequests->find()
            ->contain(['Students', 'Users'])
            ->order(['MeritLetterRequests.created' => 'DESC']);
        $meritLetterRequests = $this->paginate($query);
        $this->set(compact('meritLetterRequests'));
    }

    public function approve($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'put']);
        $meritLetterRequest = $this->MeritLetterRequests->get($id);
        $meritLetterRequest->status = 'approved';
        
        if ($this->MeritLetterRequests->save($meritLetterRequest)) {
            $this->Flash->success(__('The request has been approved.'));
        } else {
            $this->Flash->error(__('Could not approve the request.'));
        }
        return $this->redirect(['action' => 'adminIndex']);
    }

    public function deny($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'put']);
        $meritLetterRequest = $this->MeritLetterRequests->get($id);
        $meritLetterRequest->status = 'denied';
        
        if ($this->MeritLetterRequests->save($meritLetterRequest)) {
            $this->Flash->success(__('The request has been denied.'));
        } else {
            $this->Flash->error(__('Could not deny the request.'));
        }
        return $this->redirect(['action' => 'adminIndex']);
    }

    public function download($id = null)
    {
        $this->Authorization->skipAuthorization();
        $meritLetterRequest = $this->MeritLetterRequests->get($id, [
            'contain' => ['Students', 'Users']
        ]);
        
        if ($meritLetterRequest->status !== 'approved') {
            $this->Flash->error(__('This letter request has not been approved yet.'));
            return $this->redirect(['action' => 'index']);
        }
        
        // PDF generation logic will go here
        $this->set(compact('meritLetterRequest'));
    }

    public function initialize(): void
    {
        parent::initialize();
        // Add authorization checks here if needed
        $this->Authorization->skipAuthorization();
    }
}