<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MeritLetterRequestsTable extends Table 
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('merit_Letter_requests');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');

         // Define associations
         $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('file_path')
            ->maxLength('file_path', 255)
            ->requirePresence('file_path', 'create')
            ->notEmptyString('file_path');

        $validator
            ->dateTime('created')
            ->notEmptyDateTime('created');

        $validator
            ->dateTime('modified')
            ->notEmptyDateTime('modified');

        return $validator;
    }
}