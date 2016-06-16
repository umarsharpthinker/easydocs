<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDutydaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dutydays', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('employee_id');
			$table->string('day')->nullable();
			$table->time('start')->nullable();
			$table->time('end')->nullable();
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
		Schema::drop('dutydays');
	}

}
