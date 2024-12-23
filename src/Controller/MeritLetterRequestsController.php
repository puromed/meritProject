<?php
declare(strict_types=1);

namespace App\Controller;

class MeritLetterRequestsController extends AppController
{
    public function index()
    {
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
        $meritLetterRequest = $this->MeritLetterRequests->newEmptyEntity();

        // check if user has a pending or approved request
        $existingRequest = $this->MeritLetterRequests->find()
             ->where([
                'MeritLetterRequests.user_id' => $this->Authentication->getIdentity()->get('id'),
                'MeritLetterRequests.status IN' => ['pending', 'approved']
            ])
            ->first();

        if ($existingRequest) {
                $this->Flash->error(__('You already have a pending or approved request.'));
                return $this->redirect(['action' => 'index']);
            }


        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['status'] = 'pending';
            $data['user_id'] = $this->Authentication->getIdentity()->get('id');
            $meritLetterRequest = $this->MeritLetterRequests->patchEntity($meritLetterRequest, $data);
            
            if ($this->MeritLetterRequests->save($meritLetterRequest)) {
                $this->Flash->success(__('Your merit letter request has been submitted.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to submit request. Please try again.'));
        }
        $students = $this->MeritLetterRequests->Students->find('list', limit: 200)->all();
        $this->set(compact('meritLetterRequest', 'students'));
    }

    public function adminIndex()
    {
        $query = $this->MeritLetterRequests->find()
            ->contain(['Students', 'Users'])
            ->order(['MeritLetterRequests.created' => 'DESC']);
        $meritLetterRequests = $this->paginate($query);
        $this->set(compact('meritLetterRequests'));
    }

    public function approve($id = null)
    {
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
    }
}