<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDrugusagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('drugusages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('business_unit_id');
			$table->integer('patient_id');
			$table->string('drug_name',60)->nullable();
			$table->text('usage_note')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('drugusages');
	}

}
