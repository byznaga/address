<?php

use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function($table)
        {
            $table->increments('id');
            $table->string('street', 45);
            $table->string('street_additional', 45);
			$table->string('city', 45);
			$table->string('state_province_code_2_digit', 2);
			$table->string('zip', 11);
			$table->string('country_region_code_2_digit', 2);
			$table->string('country_region_code_3_digit', 3);
            $table->float('lat');
			$table->float('long');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addresses');
	}

}
