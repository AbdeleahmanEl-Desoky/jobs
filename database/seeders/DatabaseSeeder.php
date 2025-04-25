<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Shared\CompanySize\Database\Seeders\CompanySizeSeederTableSeeder;
use Modules\Shared\Field\Database\Seeders\FieldSeederTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(FieldSeederTableSeeder::class);
       $this->call(CompanySizeSeederTableSeeder::class);
    }
}
