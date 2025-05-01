<?php

namespace Modules\Shared\JobTitle\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Field\Models\Field;
use Modules\Shared\JobTitle\Models\JobTitle;
use Ranium\SeedOnce\Traits\SeedOnce;

class JobTitleSeederTableSeeder extends Seeder
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

            ['en' => 'General Manager', 'ar' => 'مدير عام','code'=>'general_manager'],
            ['en' => 'Head of Department', 'ar' => 'تصنيف', 'رئيس قسم','code'=>'head_department'],
            ['en' => 'hr manager', 'ar' => 'مدير الموارد البشرية','code'=>'hr_manager'],
        ];

        foreach ($data as $item) {
            JobTitle::Create(
                ['name' => ['en' => $item['en'], 'ar' => $item['ar']] ,'code'=> $item['code']]
            );
        }
    }
}
