<?php

namespace App\Http\Project\Database\Seeders\Api;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // database\migrations\2014_10_12_000000_create_users_table.php
        // $table->ulid('id')->primary();

        // \App\Models\User
        // use Illuminate\Database\Eloquent\Concerns\HasUlids;
        // class User extends Authenticatable
        // {
        //     use ..., HasUlids;
        // }

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('secureTestPassword')
        ]);
    }
}
