<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @method \App\Model\Entity\Student newEmptyEntity()
 * @method \App\Model\Entity\Student newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Student> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Student findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Student> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Student saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Student>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Student>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Student>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Student> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Student>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Student>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Student>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Student> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudentsTable extends Table
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

        $this->setTable('students');
        $this->setDisplayField('name');
        $this->setPrimaryKey('student_id');

        $this->addBehavior('Timestamp');
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->notEmptyString('name');

        $validator
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmptyDate('date_of_birth');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 30)
            ->notEmptyString('gender');

        $validator
            ->email('email')
            ->notEmptyString('email');

        $validator
            ->scalar('phone_number')
            ->maxLength('phone_number', 14)
            ->notEmptyString('phone_number');

        $validator
            ->scalar('address1')
            ->maxLength('address1', 100)
            ->notEmptyString('address1');

        $validator
            ->scalar('address2')
            ->maxLength('address2', 100)
            ->notEmptyString('address2');

        $validator
            ->scalar('postcode')
            ->maxLength('postcode', 10)
            ->notEmptyString('postcode');

        $validator
            ->scalar('city')
            ->maxLength('city', 100)
            ->notEmptyString('city');

        $validator
            ->scalar('state')
            ->maxLength('state', 100)
            ->notEmptyString('state');

        return $validator;
    }
}
