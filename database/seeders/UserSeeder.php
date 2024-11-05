<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'fernanda',
                'last_name' => 'velez',
                'email' => 'fer.velez@gmail.com',
                'password' => '123',
                'roles_id' => 1,
            ],
            [
                'name' => 'juan',
                'last_name' => 'perez',
                'email' => 'juan.perez@gmail.com',
                'password' => 'password123',
                'roles_id' => 1,
            ],
            [
                'name' => 'maria',
                'last_name' => 'gomez',
                'email' => 'maria.gomez@gmail.com',
                'password' => 'password456',
                'roles_id' => 1,
            ],
            [
                'name' => 'carlos',
                'last_name' => 'lopez',
                'email' => 'carlos.lopez@gmail.com',
                'password' => 'password789',
                'roles_id' => 2,
            ]
        ];

        foreach ($users as $userData) {
            User::Create(
                [
                    'name' => $userData['name'],
                    'last_name' => $userData['last_name'],
                    'email' => $userData['email'],
                    'password' => $userData['password'],
                    'roles_id' => $userData['roles_id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
