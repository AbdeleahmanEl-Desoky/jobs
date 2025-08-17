<?php

namespace Modules\Shared\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Category\Models\Category;
use Ranium\SeedOnce\Traits\SeedOnce;

class CategorySeederTableSeeder extends Seeder
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
            [
                'en' => 'Information Technology',
                'ar' => 'تكنولوجيا المعلومات',
                'code' => 'information_technology'
            ],
            [
                'en' => 'Accounting and Finance',
                'ar' => 'المحاسبة والمالية',
                'code' => 'accounting_and_finance'
            ],
            [
                'en' => 'Human Resources',
                'ar' => 'الموارد البشرية',
                'code' => 'human_resources'
            ],
            [
                'en' => 'Marketing and Sales',
                'ar' => 'التسويق والمبيعات',
                'code' => 'marketing_and_sales'
            ],
        ];

        foreach ($data as $item) {
            Category::create([
                'name' => ['en' => $item['en'], 'ar' => $item['ar']],
                'code' => $item['code']
            ]);
        }
    }
}