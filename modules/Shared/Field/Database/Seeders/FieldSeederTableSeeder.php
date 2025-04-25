<?php

namespace Modules\Shared\Field\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Field\Models\Field;

class FieldSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $data = [
            ['en' => 'Medical Field',     'ar' => 'مجال الطبي'],
            ['en' => 'Clinics Field',     'ar' => 'مجال العيادات'],
            ['en' => 'Pharmacy Field',    'ar' => 'مجال الصيدليات'],
        ];

        foreach ($data as $item) {
            Field::create([
                'name' => [
                    'en' => $item['en'],
                    'ar' => $item['ar'],
                ]
            ]);
        }
    }
}
