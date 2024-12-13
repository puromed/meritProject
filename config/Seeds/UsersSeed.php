<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Users seed.
 */
class UsersSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {

        $data = [
            [
                'id' => 3,
                'email' => 'test123@localhost.com',
                'password' => '$2y$10$jfaNnIrff1Abi8L182WxHOA.iZbfl9.vN2Y7ne2yiL.aLEhkruGF.',
                'role' => 'admin',
                'created' => '2024-12-11 11:35:51',
                'modified' => '2024-12-11 11:35:51',
            ],
            [
                'id' => 4,
                'email' => 'cuba@localhost.com',
                'password' => '$2y$10$3q7/CkArQvrAgQ0kvZzpDuJOujxZiOyzE52JXD3br6JJJMg5pfMfW',
                'role' => 'user',
                'created' => '2024-12-11 11:36:14',
                'modified' => '2024-12-11 11:36:14',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
