<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActivitiesFixture
 */
class ActivitiesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'activity_id' => 1,
                'activity_name' => 'Lorem ipsum dolor sit amet',
                'merit_id' => 1,
                'created' => '2024-12-07 14:42:51',
                'modified' => '2024-12-07 14:42:51',
            ],
        ];
        parent::init();
    }
}
