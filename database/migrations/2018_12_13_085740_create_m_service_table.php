<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMServiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_service', function(Blueprint $table)
		{
			$table->integer('id')->unsigned()->primary()->comment('ID');
			$table->integer('service_code')->unsigned()->comment('サービスコード');
			$table->string('service_name', 100)->comment('サービス名');
			$table->unique(['service_code','service_name'], 'm_service_un');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('m_service');
	}

}
