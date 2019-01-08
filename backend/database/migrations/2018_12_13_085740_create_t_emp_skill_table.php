<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTEmpSkillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_emp_skill', function(Blueprint $table)
		{
			$table->increments('id')->comment('ID');
			$table->char('emp_id', 5)->comment('社員番号');
			$table->integer('skill_code')->unsigned()->comment('スキルコード');
			$table->boolean('exp_year')->nullable()->comment('経験年数');
			$table->boolean('skill_level')->nullable()->comment('スキルレベル');
			$table->timestamps();
			$table->unique(['emp_id','skill_code'], 't_emp_skill_un');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_emp_skill');
	}

}
