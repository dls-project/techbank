<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->truncate();
        //ダミデーターを作成
        $params = [
            'skill_code' => '100100',
            'skill_class' => '言語',
            'skill_name' => 'Java',
            'created_at' => Carbon::today(),
            'updated_at' => Carbon::today()
        ];
        DB::table('skills')->insert($params);
    }
}
