<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentMeritFixture
 */
class StudentMeritFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'student_merit';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'student_merit_id' => 1,
                'student_id' => 1,
                'merit_id' => 1,
                'Date_Received' => '2024-12-07',
                'created' => '2024-12-07 14:41:41',
                'modified' => '2024-12-07 14:41:41',
            ],
        ];
        parent::init();
    }
}
