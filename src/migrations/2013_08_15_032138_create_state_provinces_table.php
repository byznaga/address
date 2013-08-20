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
            $table->integer('country_region_id');
            $table->string('name', 45);
            $table->string('code_2_digit', 2);
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
