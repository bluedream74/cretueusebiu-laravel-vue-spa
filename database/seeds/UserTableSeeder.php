<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::table('users')->insert([
            [ 
                'email' => 'test@email.com',
                'kikan_id' => '123456789021',
                'com_name' => 'asdf',
                'com_huri_name' => 'asdf',
                'tanto_name' => 'aa',
                'zipcode' => '0000000',
                'prefecture' => 'aaa',
                'password' => bcrypt('123123123')
            ],
        ]);
    }
}
