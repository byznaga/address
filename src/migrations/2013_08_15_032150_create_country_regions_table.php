<?php

use Illuminate\Database\Migrations\Migration;

class CreateCountryRegionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('country_regions', function($table)
        {
            $table->increments('id');
            $table->string('name', 45);
			$table->string('code_2_digit', 2);
            $table->string('code_3_digit', 3);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('country_regions');
	}

}
