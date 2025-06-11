<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Admin::where('email', 'admin@duggcoffee.com')->exists()) {
            Admin::create([
                'name' => 'Super Admin',
                'email' => 'admin@duggcoffee.com',
                'password' => Hash::make('admin123'),
            ]);
            $this->command->info('Super Admin created successfully.');
        } else {
            $this->command->info('Super Admin already exists, skipping...');
        }
        if (!Admin::where('email', 'newsmanager@duggcoffee.com')->exists()) {
            Admin::create([
                'name' => 'News Manager',
                'email' => 'newsmanager@duggcoffee.com',
                'password' => Hash::make('manager123'),
            ]);
            $this->command->info('News Manager created successfully.');
        } else {
            $this->command->info('News Manager already exists, skipping...');
        }
    }
}