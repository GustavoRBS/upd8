<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class seederInitial extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'Name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$mcq2deRpDC7KgiBVQucwlORyL3NuViZ5Lj3t0Y/AGzDhVk92z55Q.',
        ]);
    }
}
