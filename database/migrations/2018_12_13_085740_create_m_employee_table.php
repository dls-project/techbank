<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMEmployeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_employee', function(Blueprint $table)
		{
			$table->char('emp_id', 5)->primary()->comment('社員番号');
			$table->string('emp_name', 100)->comment('社員氏名');
			$table->char('sex', 1)->comment('性別');
			$table->integer('service_code')->unsigned()->comment('サービスコード');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('m_employee');
	}

}
