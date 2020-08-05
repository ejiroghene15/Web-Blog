<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ejiroghene Obiuwevbi',
            'email' => 'ejiroghene15@gmail.com',
            'email_verified_at' => now(),
            'account_status' => 'active',
            'username' => 'Ejiroghene',
            'password' => Hash::make('password'),
            'is_admin' => 1
        ]);
        User::create([
            'name' => 'Kohwo Akpos',
            'email' => 'kohwoakpos@gmail.com',
            'email_verified_at' => now(),
            'account_status' => 'active',
            'username' => 'Akpos',
            'password' => Hash::make('password'),
            'is_admin' => 1
        ]);
    }
}
