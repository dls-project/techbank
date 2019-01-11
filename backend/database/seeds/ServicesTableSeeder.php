<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('services')->truncate();
        //ダミデーターを作成
        $params = [
            'service_code' => 1,
            'service_name' => '開発',
            'created_at' => Carbon::today(),
            'updated_at' => Carbon::today()
        ];
        DB::table('services')->insert($params);
    }
}