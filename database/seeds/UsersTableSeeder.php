<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];

        $users[] = [
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => 'admin'
        ];
        $users[] = [
            'name' => 'vlad',
            'email' => 'vlad@mail.ru',
            'password' => 'vlad'
        ];

        DB::table('users')->insert($users);
    }
}
