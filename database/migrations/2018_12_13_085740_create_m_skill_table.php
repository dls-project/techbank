<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMSkillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_skill', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary()->comment('ID');
			$table->integer('skill_code')->unsigned()->comment('スキルコード');
			$table->string('skill_class', 100)->comment('スキル種類');
			$table->string('skill_name', 100)->comment('スキル名');
			$table->timestamps();
			$table->unique(['skill_code','skill_name'], 'm_skill_un');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('m_skill');
	}

}
