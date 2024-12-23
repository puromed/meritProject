<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MeritLetterRequests Model
 *
 * @property \App\Model\Table\StudentsTable&\Cake\ORM\Association\BelongsTo $Students
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\MeritLetterRequest newEmptyEntity()
 * @method \App\Model\Entity\MeritLetterRequest newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\MeritLetterRequest> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MeritLetterRequest get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\MeritLetterRequest findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\MeritLetterRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\MeritLetterRequest> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MeritLetterRequest|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\MeritLetterRequest saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\MeritLetterRequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MeritLetterRequest>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MeritLetterRequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MeritLetterRequest> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MeritLetterRequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MeritLetterRequest>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MeritLetterRequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MeritLetterRequest> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MeritLetterRequestsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('merit_letter_requests');
        $this->setDisplayField('student_id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('student_id')
            ->maxLength('student_id', 30)
            ->notEmptyString('student_id')
            ->add('student_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('status')
            ->maxLength('status', 50)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['student_id']), ['errorField' => 'student_id']);
        $rules->add($rules->existsIn(['student_id'], 'Students'), ['errorField' => 'student_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
