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
			$table->string('email', 50)->comment('E-MAIL');
			$table->char('sex', 1)->comment('性別');
			$table->string('address', 200)->comment('住所');
			$table->integer('service_code')->unsigned()->comment('サービスコード');
			$table->timestamps();
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
