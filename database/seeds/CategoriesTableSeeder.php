<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Men\'s Gis',
            'description' => 'Gis for men.'
        ]);
        Category::create([
            'name' => 'Women\'s Gis',
            'description' => 'Gis for women.'
        ]);
        Category::create([
            'name' => 'Kid\'s Gis',
            'description' => 'Gis for women.'
        ]);
        Category::create([
            'name' => 'Rashguards',
            'description' => 'Rashguards of all kinds.'
        ]);
        Category::create([
            'name' => 'Shorts',
            'description' => 'Comfortable shorts for no-gi grappling.'
        ]);
        Category::create([
            'name' => 'Belts',
            'description' => 'Belts of all rankings for adults and children.'
        ]);
    }
}
