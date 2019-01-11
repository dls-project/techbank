<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => bcrypt('test1234'),
                'remember_token' => null,
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ]
        ]);
    }
}
