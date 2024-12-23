<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MeritLetterRequestsFixture
 */
class MeritLetterRequestsFixture extends TestFixture
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
                'id' => 1,
                'student_id' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-12-23 13:17:01',
                'modified' => '2024-12-23 13:17:01',
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
