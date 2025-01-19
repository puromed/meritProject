<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableSchema;

/**
 * Merits Model
 *
 * @method \App\Model\Entity\Merit newEmptyEntity()
 * @method \App\Model\Entity\Merit newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Merit> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Merit get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Merit findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Merit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Merit> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Merit|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Merit saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Merit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Merit>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Merit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Merit> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Merit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Merit>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Merit>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Merit> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MeritsTable extends Table
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

        $this->setTable('merits');
        $this->setDisplayField('merit_type');
        $this->setPrimaryKey('merit_id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Activities', [
            'foreignKey' => 'merit_id',
        ]);

        $this->hasMany('StudentMerits', [
            'foreignKey' => 'merit_id',
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
            ->scalar('merit_type')
            ->maxLength('merit_type', 30)
            ->notEmptyString('merit_type');

        $validator
            ->scalar('description')
            ->maxLength('description', 100)
            ->notEmptyString('description');

        $validator
            ->numeric('points')
            ->notEmptyString('points', 'Merit points are required')
            ->greaterThanOrEqual('points', 0, 'Merit points must be 0 or greater');

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
        $rules->add($rules->isUnique(['merit_id']), ['errorField' => 'merit_id']);

        return $rules;
    }

    protected function _initializeSchema(TableSchema $schema): TableSchema
    {
        $schema->setColumnType('points', 'float');
        return $schema;
    }
}
