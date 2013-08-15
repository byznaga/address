<?php

use Illuminate\Database\Migrations\Migration;

class CreateStateProvincesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('state_provinces', function($table)
                {
                        $table->increments('id');
                        $table->string('state_province', 45);
                        $table->string('state_province_code_2_digit', 2);
                });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('state_provinces');
	}

}
