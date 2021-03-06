<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$EGZ.IkdG7X8JaIJUAhlw3O.RMw2eqIEjVKzbA4jCatDYJKYWj2kOO',
                'remember_token' => null,
                'middle_name'    => '',
                'last_name'      => '',
            ],
        ];

        User::insert($users);
    }
}
