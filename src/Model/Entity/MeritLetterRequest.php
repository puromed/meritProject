<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MeritLetterRequest Entity
 *
 * @property int $id
 * @property string $student_id
 * @property string $status
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\User $user
 */
class MeritLetterRequest extends Entity
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
        'status' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'student' => true,
        'user' => true,
    ];
}
