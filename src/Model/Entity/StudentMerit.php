<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentMerit Entity
 *
 * @property int $student_merit_id
 * @property int|null $student_id
 * @property int|null $merit_id
 * @property \Cake\I18n\Date|null $Date_Received
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Merit $merit
 */
class StudentMerit extends Entity
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
        'merit_id' => true,
        'activity_id' => true,
        'Date_Received' => true,
        'points' => true,
        'created' => true,
        'modified' => true,
        'student' => true,
        'merit' => true,
    ];
}
