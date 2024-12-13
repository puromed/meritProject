<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class Initial extends BaseMigration
{
    /**
     * Up Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-up-method
     * @return void
     */
    public function up(): void
    {
        $this->table('activities', ['id' => false, 'primary_key' => ['activity_id']])
            ->addColumn('activity_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('activity_name', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => false,
            ])
            ->addColumn('merit_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'merit_id',
                ],
                [
                    'name' => 'merit_id',
                ]
            )
            ->create();

        $this->table('merits', ['id' => false, 'primary_key' => ['merit_id']])
            ->addColumn('merit_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('merit_type', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('description', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('points', 'float', [
                'default' => '0',
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('created', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'merit_id',
                ],
                [
                    'name' => 'merit_id',
                    'unique' => true,
                ]
            )
            ->create();

        $this->table('student_merits', ['id' => false, 'primary_key' => ['student_merit_id']])
            ->addColumn('student_merit_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('student_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => true,
            ])
            ->addColumn('merit_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => true,
                'signed' => true,
            ])
            ->addColumn('Date_Received', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'student_id',
                ],
                [
                    'name' => 'student_id',
                ]
            )
            ->addIndex(
                [
                    'merit_id',
                ],
                [
                    'name' => 'merit_id',
                ]
            )
            ->create();

        $this->table('students', ['id' => false, 'primary_key' => ['student_id']])
            ->addColumn('student_id', 'integer', [
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => true,
            ])
            ->addColumn('name', 'string', [
                'default' => 'empty',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('date_of_birth', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('gender', 'string', [
                'default' => 'empty',
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => 'empty',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('phone_number', 'string', [
                'default' => 'empty',
                'limit' => 14,
                'null' => false,
            ])
            ->addColumn('address1', 'string', [
                'default' => 'empty',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('address2', 'string', [
                'default' => 'empty',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('postcode', 'string', [
                'default' => 'empty',
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('city', 'string', [
                'default' => 'empty',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('state', 'string', [
                'default' => 'empty',
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('created', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $this->table('users')
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('role', 'string', [
                'default' => 'user',
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'email',
                ],
                [
                    'name' => 'email',
                    'unique' => true,
                ]
            )
            ->create();

        $this->table('activities')
            ->addForeignKey(
                'merit_id',
                'merits',
                'merit_id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                    'constraint' => 'activities_ibfk_1'
                ]
            )
            ->update();

        $this->table('student_merits')
            ->addForeignKey(
                'student_id',
                'students',
                'student_id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                    'constraint' => 'student_merits_ibfk_1'
                ]
            )
            ->addForeignKey(
                'merit_id',
                'merits',
                'merit_id',
                [
                    'update' => 'NO_ACTION',
                    'delete' => 'NO_ACTION',
                    'constraint' => 'student_merits_ibfk_2'
                ]
            )
            ->update();
    }

    /**
     * Down Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-down-method
     * @return void
     */
    public function down(): void
    {
        $this->table('activities')
            ->dropForeignKey(
                'merit_id'
            )->save();

        $this->table('student_merits')
            ->dropForeignKey(
                'student_id'
            )
            ->dropForeignKey(
                'merit_id'
            )->save();

        $this->table('activities')->drop()->save();
        $this->table('merits')->drop()->save();
        $this->table('student_merits')->drop()->save();
        $this->table('students')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
