<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Superadmin',
                'email' => 'superadmin@app.com',
                'password' => 'password',
                'email_verified_at' => now(),
                'role' => 'superadmin',

            ],
        ];

        foreach ($users as $user) {
            //create a user if not exists
            $model = User::firstOrCreate (
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                    'email_verified_at' => $user['email_verified_at'],
                ]
                );

                $model->assignRole($user['role']);
        }
    }
}
