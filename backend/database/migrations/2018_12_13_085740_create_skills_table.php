<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skills', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('skill_code')->comment('スキルコード');
			$table->string('skill_class', 100)->comment('スキル種類');
			$table->string('skill_name', 100)->comment('スキル名');
			$table->timestamps();
			$table->unique(['skill_code','skill_name'], 'skills_un');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('skills');
	}

}
