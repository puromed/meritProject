<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;  
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Initialize controller
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');
        $this->Authentication->addUnauthenticatedActions(['login']);

    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);

    // skip authorization for login and display

 $this->Authentication->allowUnauthenticated(['login', 'add','landing']);
 $this->Authorization->skipAuthorization(['login', 'logout']);
}


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    public function landing()
    {
        $query = $this->Users->find();
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

    //authentication plugin
    public function login()
    {

        // skip authorization for login
        $this->Authorization->skipAuthorization();

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            // Get user data
            $user = $result->getData();
    
            // Check user role and redirect accordingly
            if ($user->role === 'admin') {
                return $this->redirect([
                    'controller' => 'Pages',
                    'action' => 'admin_dashboard',
                    'prefix' => false, // Ensure no admin prefix
                ]);
            } else {
                return $this->redirect([
                    'controller' => 'Pages',
                    'action' => 'user_dashboard',
                    'prefix' => false,
                ]);
            }
        } else {
            if ($this->request->is('post')) {
                $this->Flash->error('Invalid username or password');
            }
        }
    }

public function logout()
{
    // skip authorization for logout
    $this->Authorization->skipAuthorization();
    
    $this->Authentication->logout();
    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
}

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->request->allowMethod(['get']);

        try {
            $user = $this->Users->get($id); // Fetch only user data

            $response = [
                'user' => [
                    'id' => $user->id,
                    'email' => $user->email,
                    'role' => $user->role,
                    'created' => $user->created->format('Y-m-d H:i:s'),
                    'modified' => $user->modified->format('Y-m-d H:i:s')
                ]
            ];

            return $this->response->withType('application/json')
                ->withStringBody(json_encode($response));

        } catch (\Exception $e) {
            $this->log("Error in view action: " . $e->getMessage(), 'error');

            return $this->response->withType('application/json')
                ->withStatus(500)
                ->withStringBody(json_encode([
                    'error' => 'Error loading user details',
                    'message' => $e->getMessage()
                ]));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            // Start database transaction
            $connection = ConnectionManager::get('default');
            $connection->begin();

            try {
                // Patch user entity
                $user = $this->Users->patchEntity($user, $this->request->getData());

                // Save user
                if ($this->Users->save($user)) {
                    // Create corresponding student record
                    $studentsTable = TableRegistry::getTableLocator()->get('Students');
                    $student = $studentsTable->newEmptyEntity();

                    $studentData = [
                        'user_id' => $user->id,
                        'name' => $this->request->getData('name'),
                        'student_id' => $this->request->getData('student_id'),
                        'date_of_birth' => $this->request->getData('date_of_birth'),
                        'gender' => $this->request->getData('gender'),
                        'email' => $user->email,
                        'phone_number' => $this->request->getData('phone_number'),
                        'address1' => $this->request->getData('address1'),
                        'address2' => $this->request->getData('address2'),
                        'city' => $this->request->getData('city'),
                        'postcode' => $this->request->getData('postcode'),
                        'state' => $this->request->getData('state'),
                    ];

                    // Patch student entity
                    $student = $studentsTable->patchEntity($student, $studentData);

                    // Save student
                    if ($studentsTable->save($student)) {
                        $connection->commit();
                        $this->Flash->success(__('The user and student have been saved.'));
                        return $this->redirect(['action' => 'login']);
                    } else {
                        $connection->rollback();
                        $this->Flash->error(__('The student could not be saved. Errors: ') . json_encode($student->getErrors()));
                    }
                } else {
                    $connection->rollback();
                    $this->Flash->error(__('The user could not be saved. Errors: ') . json_encode($user->getErrors()));
                }
            } catch (\Exception $e) {
                $this->log($e->getMessage(), 'error');
                $connection->rollback();
                $this->Flash->error(__('An error occurred: ') . $e->getMessage());
            }
        }

        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
