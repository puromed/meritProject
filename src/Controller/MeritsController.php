<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Merits Controller
 *
 * @property \App\Model\Table\MeritsTable $Merits
 */
class MeritsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['login']);
    }

    public function index()
    {
        $this->Authorization->skipAuthorization();

        $merits = $this->paginate($this->Merits);

        $this->set(compact('merits'));
    }

    /**
     * View method
     *
     * @param string|null $id Merit id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();

        $merit = $this->Merits->get($id, contain: []);
        $this->set(compact('merit'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();

        $merit = $this->Merits->newEmptyEntity();
        if ($this->request->is('post')) {
            $merit = $this->Merits->patchEntity($merit, $this->request->getData());
            if ($this->Merits->save($merit)) {
                $this->Flash->success(__('The merit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merit could not be saved. Please, try again.'));
        }
        $this->set(compact('merit'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Merit id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();

        $merit = $this->Merits->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $merit = $this->Merits->patchEntity($merit, $this->request->getData());
            if ($this->Merits->save($merit)) {
                $this->Flash->success(__('The merit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The merit could not be saved. Please, try again.'));
        }
        $this->set(compact('merit'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Merit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();

        $this->request->allowMethod(['post', 'delete']);
        $merit = $this->Merits->get($id);
        if ($this->Merits->delete($merit)) {
            $this->Flash->success(__('The merit has been deleted.'));
        } else {
            $this->Flash->error(__('The merit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
