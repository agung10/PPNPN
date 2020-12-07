<?php

use Illuminate\Database\Seeder;

class AppSeeder/PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('pendidikans')->truncate();

        \App\Model\Pendidikan::insert([
            [

            ],
        ]);
    }
}
