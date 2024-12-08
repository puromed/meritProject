<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MeritsFixture
 */
class MeritsFixture extends TestFixture
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
                'merit_id' => 1,
                'merit_type' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'points' => 1,
                'created' => 1733582518,
                'modified' => 1733582518,
            ],
        ];
        parent::init();
    }
}
