<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * StudentMerits Controller
 *
 * @property \App\Model\Table\StudentMeritsTable $StudentMerits
 */
class StudentMeritsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->StudentMerits->find()
            ->contain(['Students', 'Merits']);
        $studentMerits = $this->paginate($query);

        $this->set(compact('studentMerits'));
    }

    /**
     * View method
     *
     * @param string|null $id Student Merit id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentMerit = $this->StudentMerits->get($id, contain: ['Students', 'Merits']);
        $this->set(compact('studentMerit'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentMerit = $this->StudentMerits->newEmptyEntity();
        if ($this->request->is('post')) {
            $studentMerit = $this->StudentMerits->patchEntity($studentMerit, $this->request->getData());
            if ($this->StudentMerits->save($studentMerit)) {
                $this->Flash->success(__('The student merit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student merit could not be saved. Please, try again.'));
        }
        $students = $this->StudentMerits->Students->find('list', limit: 200)->all();
        $merits = $this->StudentMerits->Merits->find('list', limit: 200)->all();
        $this->set(compact('studentMerit', 'students', 'merits'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Student Merit id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentMerit = $this->StudentMerits->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentMerit = $this->StudentMerits->patchEntity($studentMerit, $this->request->getData());
            if ($this->StudentMerits->save($studentMerit)) {
                $this->Flash->success(__('The student merit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The student merit could not be saved. Please, try again.'));
        }
        $students = $this->StudentMerits->Students->find('list', limit: 200)->all();
        $merits = $this->StudentMerits->Merits->find('list', limit: 200)->all();
        $this->set(compact('studentMerit', 'students', 'merits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Student Merit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentMerit = $this->StudentMerits->get($id);
        if ($this->StudentMerits->delete($studentMerit)) {
            $this->Flash->success(__('The student merit has been deleted.'));
        } else {
            $this->Flash->error(__('The student merit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
