<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname' => 'Ahmad',
            'lastname' => 'Jano',
            'gender' => 'male',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => 1,
        ]);

        User::factory()
                ->count(20)
                ->create();        
    }
}
