<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Shared\CompanySize\Database\Seeders\CompanySizeSeederTableSeeder;
use Modules\Shared\Degree\Database\Seeders\DegreeSeederTableSeeder;
use Modules\Shared\Field\Database\Seeders\FieldSeederTableSeeder;
use Modules\Shared\Field\Database\Seeders\JobTitleSeederTableSeeder;
use Modules\Shared\JobTitle\Database\Seeders\JobTitleSeederTableSeeder as SeedersJobTitleSeederTableSeeder;
use Modules\Shared\Specialization\Database\Seeders\SpecializationSeederTableSeeder;
use Modules\Shared\StatusEmployment\Database\Seeders\StatusEmploymentSeederTableSeeder;
use Modules\Shared\University\Database\Seeders\UniversitiesSeederTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call(FieldSeederTableSeeder::class);
       $this->call(CompanySizeSeederTableSeeder::class);
       $this->call(SeedersJobTitleSeederTableSeeder::class);
       $this->call(SpecializationSeederTableSeeder::class);
       $this->call(UniversitiesSeederTableSeeder::class);
       $this->call(StatusEmploymentSeederTableSeeder::class);
       $this->call(DegreeSeederTableSeeder::class);

    }
}
