<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager as SearchManager;

/**
 * Activities Model
 *
 * @property \App\Model\Table\MeritsTable&\Cake\ORM\Association\BelongsTo $Merits
 *
 * @method \App\Model\Entity\Activity newEmptyEntity()
 * @method \App\Model\Entity\Activity newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Activity> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Activity get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Activity findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Activity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Activity> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Activity|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Activity saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Activity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Activity>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Activity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Activity> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Activity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Activity>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Activity>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Activity> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ActivitiesTable extends Table
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

        $this->setTable('activities');
        $this->setDisplayField('activity_name');
        $this->setPrimaryKey('activity_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Merits', [
            'foreignKey' => 'merit_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('StudentMerits', [
            'foreignKey' => 'activity_id',
        ]);

        $this->addBehavior('Search.Search');
    }

    // search configuration
    public function searchConfiguration(): array
    {
        $search = new SearchManager($this);
        $search
            ->add('activity_name', [
                'before' => true,
                'after' => true,
                'field' => 'Activities.activity_name',
                'filterEmpty' => true,
                'mode' => 'and'
            ])
            ->add('location', [
                'before' => true,
                'after' => true,
                'field' => 'Activities.location',
                'filterEmpty' => true,
                'mode' => 'and'
            ])
            ->add('availability', [
                'field' => 'Activities.availability',
                'filterEmpty' => true,
                'mode' => 'and'
            ])
            ->add('merit_id',  [
                'field' => 'Activities.merit_id',
                'filterEmpty' => true,
                'mode' => 'and'
            ])
            ->add('from_date',  [
                'operator' => '>=',
                'field' => 'Activities.activity_date',
                'filterEmpty' => true,
                'mode' => 'and'
            ])
            ->add('to_date',  [
                'operator' => '<=',
                'field' => 'Activities.activity_date',
                'filterEmpty' => true,
                'mode' => 'and'
            ]);

        return $search;
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
            ->scalar('activity_name')
            ->maxLength('activity_name', 50)
            ->requirePresence('activity_name', 'create')
            ->notEmptyString('activity_name');
        $validator
            ->scalar('description')
            ->allowEmptyString('description');
        $validator
            ->dateTime('activity_date')
            ->requirePresence('activity_date', 'create')
            ->notEmptyDateTime('activity_date');
        $validator
            ->scalar('location')
            ->maxLength('location', 100)
            ->allowEmptyString('location');
        $validator
            ->scalar('availability')
            ->maxLength('availability', 20)
            ->requirePresence('availability', 'create')
            ->notEmptyString('availability');
        $validator
            ->integer('merit_id')
            ->allowEmptyString('merit_id');

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
        $rules->add($rules->existsIn(['merit_id'], 'Merits'), ['errorField' => 'merit_id']);

        return $rules;
    }
}
