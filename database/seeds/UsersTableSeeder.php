<?php

use Illuminate\Support\Str;
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
            'email' => 'admin@fantastictoys.com',
            'password' => bcrypt('password'),
            'job_title' => 'CTO and Founder'
        ]);
        $admin->assignRole('Admin');

        $manager = User::create([
            'name' => 'Juan Estrada',
            'email' => 'manager@fantastictoys.com',
            'password' => bcrypt('password'),
            'job_title' => 'Store Manager'
        ]);
        $manager->assignRole('Manager');

        $hr = User::create([
            'name' => 'Dolly Johnson',
            'email' => 'hr@fantastictoys.com',
            'password' => bcrypt('password'),
            'job_title' => 'Human Resources Generalist'
        ]);
        $hr->assignRole('Human Resources');

        $customerService = User::create([
            'name' => 'Bob Smith',
            'email' => 'customerservice@fantastictoys.com',
            'password' => bcrypt('password'),
            'job_title' => 'Customer Services Associate'
        ]);
        $customerService->assignRole('Customer Services');

        $employees_arr = array($manager, $hr, $customerService);
        $admin->employees()->saveMany($employees_arr);
    }
}
