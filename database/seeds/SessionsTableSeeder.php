<?php

use Illuminate\Database\Seeder;

class SessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sessions')->insert(['session' => '10:00 - 12:00']);
        DB::table('sessions')->insert(['session' => '12:00 - 14:00']);
        DB::table('sessions')->insert(['session' => '14:00 - 16:00']);
        DB::table('sessions')->insert(['session' => '16:00 - 18:00']);
    }
}
