<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddedLetterRequest extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('merit_letter_requests');
        $table->addColumn('student_id', 'string', ['limit' => 30])
            ->addColumn('status', 'string', [ 
            'default' => null,
            'limit' => 50,
            'null' => false,])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addColumn('user_id', 'integer')
            ->addForeignKey('student_id', 'students', 'student_id')
            ->addForeignKey('user_id', 'users', 'id')
            ->create();
    }
}
