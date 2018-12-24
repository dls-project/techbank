<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class MEmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');
        DB::table('m_employee')->truncate();
        //ダミデーターを作成
        for( $i = 1; $i <= 1000; $i++ ) {
            $params = [
                'emp_id' => sprintf('%05d', $i),
                'emp_name' => $faker->name,
                'sex' => $faker->randomElement( $array = ['男', '女']),
                'service_code' => $faker->randomDigit(),
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today()
            ];
            DB::table('m_employee')->insert($params);
            // factory(App\MEmployee::class, 1000)->create();
        }

    }
}
