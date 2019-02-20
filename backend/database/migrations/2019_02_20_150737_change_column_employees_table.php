<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // １ファイル内で同一カラムの変更をする場合、スキーマを複数用意する
        // varchar 200 -> 100
        Schema::table('employees', function (Blueprint $table) {
            $table->string('address', 100)->comment('最寄り駅')->change();
        });

        //address -> station
        Schema::table('employees', function (Blueprint $table) {
            $table->renameColumn('address', 'station');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->renameColumn('station', 'address');
        });

        Schema::table('employees', function (Blueprint $table) {
            $table->string('address', 200)->comment('住所')->change();
        });
    }
}
