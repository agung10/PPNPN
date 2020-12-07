<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();

        \App\User::insert([
            [
                'name' => 'Admin Utama',
                'email' => 'adminutama@gmail.com',
                'password' => \Hash::make("123321"),
                'password_'  => '123321',
                'role'      => 'AdminUtama',
                'api_token'  => \Str::random(50),
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => \Hash::make("123321"),
                'password_'  => '123321',
                'role'      => 'Administrator',
                'api_token'  => \Str::random(50),
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ],
            [
                'name' => 'Joko Budiharja',
                'email' => 'joko@gmail.com',
                'password' => \Hash::make("123321"),
                'password_'  => '123321',
                'role'      => 'User',
                'api_token'  => \Str::random(50),
                'created_at' => \Carbon\Carbon::now('Asia/jakarta'),
                'updated_at' => \Carbon\Carbon::now('Asia/jakarta')
            ]
        ]);
    }
}
