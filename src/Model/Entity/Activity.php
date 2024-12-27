<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Activity Entity
 *
 * @property int $activity_id
 * @property string $activity_name
 * @property int|null $merit_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Merit $merit
 */
class Activity extends Entity
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
        'activity_name' => true,
        'description' => true,
        'activity_date' => true,
        'location' => true,
        'merit_id' => true,
        'availability' => true,
        'created' => true,
        'modified' => true,
        'merit' => true,
    ];
}
