<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Rudy Crespo',
            'email' => 'crespor@montclair.edu',
            'password' => bcrypt('password'),
            'job_title' => 'CTO and Founder'
        ]);
        
        $admin->givePermissionTo(['manage_users', 'manage_orders', 'manage_categories', 'manage_products']);
    }
}
