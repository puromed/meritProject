<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\Locator\LocatorAwareTrait;
/**
 * Activities Controller
 *
 * @property \App\Model\Table\ActivitiesTable $Activities
 */
class ActivitiesController extends AppController
{
 use LocatorAwareTrait;
    
    public function initialize(): void
    {
        parent:: initialize();

        // load authorization component
        $this->loadComponent('Authorization.Authorization');
        // Load models using TableLocator
        $this->Merits = $this->getTableLocator()->get('Merits');
        $this->StudentMerits = $this->getTableLocator()->get('StudentMerits');

    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // Skip authorization for public actions
        $this->Authorization->skipAuthorization(['index', 'available']);
    }
    // For students to view available activities
    public function available()
    {
        // Allow all users to view activities
        $this->Authorization->skipAuthorization();

        $activities = $this->Activities->find()
            ->contain(['Merits'])
            ->where(['availability' => 'open'])
            ->order(['activity_date' => 'ASC'])
            ->all();

        $this->set(compact('activities'));
    }

    // For students to view their joined activities
    public function myActivities()
    {
        // Get current user
        $user = $this->request->getAttribute('identity');

        // Get student record
        $student = $this->getTableLocator()->get('Students')->find()
            ->where(['user_id' => $user->id])
            ->first();

        if (!$student) {
            $this->Flash->error('Student record not found.');
        return $this->redirect(['action' => 'available']);
        }

        // Get all activities joined by the student
        $joinedActivities = $this->StudentMerits->find()
            ->contain(['Activities', 'Merits'])
            ->where(['StudentMerits.student_id' => $student->student_id])
            ->order(['StudentMerits.created' => 'DESC'])
            ->all();

        // Calculate total points
        $totalPoints = $this->StudentMerits->find()
            ->where(['student_id' => $student->student_id])
            ->select(['total' => $this->StudentMerits->find()->func()->sum('points')])
            ->first();

        $totalPoints = $totalPoints ? $totalPoints->total: 0;

        $this->set(compact('joinedActivities', 'totalPoints'));
    }

   
   
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        
        $searchParams = $this->request->getQuery();
        
        $query = $this->Activities->find('search', ['search' => $searchParams])
            ->contain(['Merits', 'StudentMerits']);
        
        // Handle each search field
        if (!empty($searchParams['activity_name'])) {
            $query->where(['Activities.activity_name LIKE' => '%' . $searchParams['activity_name'] . '%']);
        }
        
        if (!empty($searchParams['location'])) {
            $query->where(['Activities.location LIKE' => '%' . $searchParams['location'] . '%']);
        }
        
        if (!empty($searchParams['availability'])) {
            $query->where(['Activities.availability' => $searchParams['availability']]);
        }
        
        if (!empty($searchParams['merit_id'])) {
            $query->where(['Activities.merit_id' => $searchParams['merit_id']]);
        }
        
        if (!empty($searchParams['from_date'])) {
            $query->where(['Activities.activity_date >=' => $searchParams['from_date']]);
        }
        
        if (!empty($searchParams['to_date'])) {
            $query->where(['Activities.activity_date <=' => $searchParams['to_date']]);
        }
        
        $merits = $this->Activities->Merits->find('list')->all();
        $activities = $this->paginate($query);
        
        $this->set(compact('activities', 'merits'));
    }

    /**
     * View method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activity = $this->Activities->get($id, contain: ['Merits']);
        $this->set(compact('activity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $activity = $this->Activities->newEmptyEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->getData());
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activity could not be saved. Please, try again.'));
        }
        $merits = $this->Activities->Merits->find('list', ['limit' => 200])->all();
        $this->set(compact('activity', 'merits'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->request->getData());
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The activity could not be saved. Please, try again.'));
        }
        $merits = $this->Activities->Merits->find('list', ['limit' => 200])->all();
        $this->set(compact('activity', 'merits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $activity = $this->Activities->get($id);
        if ($this->Activities->delete($activity)) {
            $this->Flash->success(__('The activity has been deleted.'));
        } else {
            $this->Flash->error(__('The activity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // For students to join an activity
    public function join($id = null)
    {
        $this->request->allowMethod(['post']);

        // Get the current user
        $user = $this->request->getAttribute('identity');

        // Get the student record
        $student = $this->getTableLocator()->get('Students')->find()
            ->where(['user_id' => $user->id])
            ->first();

        if (!$student) {
            $this->Flash->error(__('Unable to find your student record. Please contact your administrator.'));
            return $this->redirect(['action' => 'available']);
        }

        // Get the activity
        $activity = $this->Activities->get($id, [
            'contain' => ['Merits']
        ]);

        // Check if activity is available
        if ($activity->availability !== 'open') {
            $this->Flash->error('This activity is no longer available for joining.');
            return $this->redirect(['action' => 'available']);
        }

        // Check if the student has already joined this activity
        $existingRegistration = $this->StudentMerits->find()
            ->where([
                'student_id' => $student->student_id,
                'activity_id' => $activity->activity_id
            ])
            ->first();

            if ($existingRegistration) {
                $this->Flash->error('You have already joined this activity.');
                return $this->redirect(['action' => 'available']);
            }

        // Create a new student merit record
        $studentMerit = $this->StudentMerits->newEntity([
            'student_id' => $student->student_id,
            'merit_id' => $activity->merit_id,
            'Date_Received' => date('Y-m-d'),
            'activity_id' => $activity->activity_id,
            'points' => $activity->merit->points,
        ]);


        if ($this->StudentMerits->save($studentMerit)) {
            $this->Flash->success('You have joined this activity successfully.');
        } else {
            $this->Flash->error('Unable to join this activity. Please try again.');
        }

        return $this->redirect(['action' => 'available']);
    }

    // for students to view their activities
   
}
