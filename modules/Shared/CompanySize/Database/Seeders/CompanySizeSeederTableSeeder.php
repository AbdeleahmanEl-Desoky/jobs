<?php

namespace Modules\Shared\CompanySize\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Shared\CompanySize\Models\CompanySize;
use Ranium\SeedOnce\Traits\SeedOnce;

class CompanySizeSeederTableSeeder extends Seeder
{
    use SeedOnce;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        CompanySize::create([
            'from'=>5,
            "to" => 10,
        ]);

        CompanySize::create([
            'from'=>10,
            "to" => 50,
        ]);

        CompanySize::create([
            'from'=>50,
            "to" => 100,
        ]);

        CompanySize::create([
            'from'=>100,
            "to" => 500,
        ]);
    }
}
