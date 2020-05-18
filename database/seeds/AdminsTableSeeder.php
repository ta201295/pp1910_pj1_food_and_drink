<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'phone' => '',
                'password' => Hash::make('admin'), // password
                'email' => 'admin@admin.com',
                'role_id' => '1',
                'avatar' => 'admin.jpg'
            ],
        ]);
    }
}
