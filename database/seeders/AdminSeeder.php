<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '123456'
        ]);
    }
}
