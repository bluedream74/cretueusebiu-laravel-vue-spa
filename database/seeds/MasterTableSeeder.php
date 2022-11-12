<?php

use Illuminate\Database\Seeder;

class MasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('masters')->truncate();

        DB::table('masters')->insert([
            [ 
                'price' => 500,
                'special_price' => 500,
            ],
        ]);
    }
}
