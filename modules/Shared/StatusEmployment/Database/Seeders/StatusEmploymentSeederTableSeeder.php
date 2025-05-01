<?php

namespace Modules\Shared\StatusEmployment\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Field\Models\Field;
use Modules\Shared\StatusEmployment\Models\StatusEmployment;
use Ranium\SeedOnce\Traits\SeedOnce;

class StatusEmploymentSeederTableSeeder extends Seeder
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
            // --- Engineering ---
            ['ar' => 'يبحث عن وظيفة', 'en' => 'Not Employed', 'code' => 'employed'],
            ['ar' => 'موظف', 'en' => 'Employed', 'code' => 'employed'],
        ];

        foreach ($data as $item) {
            StatusEmployment::Create(
                ['name' => ['en' => $item['en'], 'ar' => $item['ar']] ,'code'=> $item['code']]
            );
        }
    }
}
