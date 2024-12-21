<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Validation\Validator;

/**
 * Student Entity
 *
 * @property int $student_id
 * @property string $name
 * @property \Cake\I18n\Date $date_of_birth
 * @property string $gender
 * @property string $email
 * @property string $phone_number
 * @property string $address1
 * @property string $address2
 * @property string $postcode
 * @property string $city
 * @property string $state
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 */
class Student extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'student_id' => true,
        'user_id' => true,
        'name' => true,
        'date_of_birth' => true,
        'gender' => true,
        'email' => true,
        'phone_number' => true,
        'address1' => true,
        'address2' => true,
        'postcode' => true,
        'city' => true,
        'state' => true,
        'created' => true,
        'modified' => true,
    ];

    // validators for name, date_of_birth, gender

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmptyDate('date_of_birth');

        $validator
            ->scalar('gender')
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender');
        $validator
        //student_id
            ->scalar('student_id')
            ->maxLength('student_id', 50)
            ->notEmptyString('student_id');
    return $validator;
    }
}
