<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('admins')->truncate();

        DB::table('admins')->insert([
            [ 
                'email' => 'admin@hozyokin.jp',
                'password' => bcrypt('123123123')
            ],
        ]);
    }
}
