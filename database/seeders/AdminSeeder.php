<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@eatdrink.com',
        ], [
            'nom_entreprise' => 'Admin',
            'password' => Hash::make('admin1234'),
            'role' => 'admin',
            'statut' => 'approuve',
        ]);
    }
} 