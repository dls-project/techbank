<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');
        DB::table('employees')->truncate();
        //ダミデーターを作成
        for( $i = 1; $i <= 500; $i++ ) {
            $params = [
                'emp_id' => sprintf('%05d', $i),
                'emp_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'gender' => $faker->randomElement( $array = ['男', '女']),
                'service_code' => $faker->randomDigit(),
                'station' => $faker->city . '駅',
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ];
            DB::table('employees')->insert($params);
            // factory(App\Employees::class, 1000)->create();
        }

    }
}
