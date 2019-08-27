<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'manage_orders']);
        Permission::create(['name' => 'manage_categories']);        
        Permission::create(['name' => 'manage_products']);
    }
}
