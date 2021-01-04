<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Minh Lee',
            'email' => 'minhkute10399@gmail.com',
            'image' => 'admin.png',
            'role_id' => 0,
            'status' => 1,
            'password' => Hash::make('12345678'),
        ]);
    }
}
