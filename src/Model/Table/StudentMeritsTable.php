<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentMerits Model
 *
 * @property \App\Model\Table\StudentsTable&\Cake\ORM\Association\BelongsTo $Students
 * @property \App\Model\Table\MeritsTable&\Cake\ORM\Association\BelongsTo $Merits
 *
 * @method \App\Model\Entity\StudentMerit newEmptyEntity()
 * @method \App\Model\Entity\StudentMerit newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\StudentMerit> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StudentMerit get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\StudentMerit findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\StudentMerit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\StudentMerit> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StudentMerit|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\StudentMerit saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\StudentMerit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StudentMerit>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\StudentMerit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StudentMerit> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\StudentMerit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StudentMerit>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\StudentMerit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\StudentMerit> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudentMeritsTable extends Table
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

        $this->setTable('student_merits');
        $this->setDisplayField('student_merit_id');
        $this->setPrimaryKey('student_merit_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
        ]);
        $this->belongsTo('Merits', [
            'foreignKey' => 'merit_id',
        ]);
        $this->belongsTo('Activities', [
            'foreignKey' => 'activity_id',
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
            ->integer('student_id')
            ->allowEmptyString('student_id');

        $validator
            ->integer('merit_id')
            ->allowEmptyString('merit_id');

        $validator
            ->date('Date_Received')
            ->allowEmptyDate('Date_Received');

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
        parent::buildRules($rules);
        /**
         * Activitiy rules
         */

         $rules->add($rules->isUnique(
            ['student_id', 'activity_id'],
            'You have already joined this activity.'
         ));

         /**
          * Student rules
          */
        $rules->add($rules->existsIn(['student_id'], 'Students'), ['errorField' => 'student_id']);
        $rules->add($rules->existsIn(['merit_id'], 'Merits'), ['errorField' => 'merit_id']);

        return $rules;
    }
}
