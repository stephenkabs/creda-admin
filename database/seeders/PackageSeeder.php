<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::insert([
            [
                'name' => 'Starter',
                'price' => 2000,
                'max_users' => 3,
                'max_borrowers' => 300,
                'sms_limit' => 1000,
                'api_access' => false,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Business',
                'price' => 4000,
                'max_users' => 10,
                'max_borrowers' => 2000,
                'sms_limit' => 5000,
                'api_access' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Enterprise',
                'price' => 8000,
                'max_users' => 50,
                'max_borrowers' => 10000,
                'sms_limit' => null,
                'api_access' => true,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
