<?php

namespace Modules\Shared\Degree\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Degree\Models\Degree;
use Ranium\SeedOnce\Traits\SeedOnce;

class DegreeSeederTableSeeder extends Seeder
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

        $data = [
            ['en' => 'Diploma',     'ar' => 'دبلوم'],
            ['en' => 'Bachelor',    'ar' => 'بكالوريوس'],
            ['en' => 'Master',      'ar' => 'ماجستير'],
            ['en' => 'Doctorate',   'ar' => 'دكتوراه'],
            ['en' => 'High School', 'ar' => 'ثانوية عامة'],
        ];

        foreach ($data as $item) {
            Degree::create([
                'name' => [
                    'en' => $item['en'],
                    'ar' => $item['ar'],
                ],
                'code' => strtolower(str_replace(' ', '_', $item['en']))
            ]);
        }

    }
}
