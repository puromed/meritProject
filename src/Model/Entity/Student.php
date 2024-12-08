<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

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
}
