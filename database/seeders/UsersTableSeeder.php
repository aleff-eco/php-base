<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'email'     =>'admin@test.com',
            'password'  => Hash::make('password'),
            'status_id' => 1,
            'role_id'   => 1,
            'person_id' => 1,
        ]);
    }
}
