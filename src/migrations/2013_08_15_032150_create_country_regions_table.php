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
                        $table->string('country_region', 45);
			$table->string('country_region_code_2_digit', 2);
                        $table->string('country_region_code_3_digit', 3);
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
