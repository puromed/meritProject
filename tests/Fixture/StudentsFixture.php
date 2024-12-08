<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsFixture
 */
class StudentsFixture extends TestFixture
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
                'student_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'date_of_birth' => '2024-12-07',
                'gender' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'phone_number' => 'Lorem ipsum ',
                'address1' => 'Lorem ipsum dolor sit amet',
                'address2' => 'Lorem ipsum dolor sit amet',
                'postcode' => 'Lorem ip',
                'city' => 'Lorem ipsum dolor sit amet',
                'state' => 'Lorem ipsum dolor sit amet',
                'created' => 1733582443,
                'modified' => 1733582443,
            ],
        ];
        parent::init();
    }
}
