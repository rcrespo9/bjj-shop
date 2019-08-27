<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(['manage_users', 'manage_orders', 'manage_categories', 'manage_products']);

        $manager = Role::create(['name' => 'Manager']);
        $manager->givePermissionTo(['manage_orders', 'manage_categories', 'manage_products']);

        $hr = Role::create(['name' => 'Human Resources']);
        $hr->givePermissionTo('manage_users');

        $customerService = Role::create(['name' => 'Customer Services']);
        $customerService->givePermissionTo('manage_orders');
    }
}
