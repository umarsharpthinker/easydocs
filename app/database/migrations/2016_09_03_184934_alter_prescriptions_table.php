<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPrescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prescriptions', function($table) {
			$table->dropColumn('procedure');
			$table->dropColumn('note');
			$table->integer('parent_id')->nullable();
			$table->text('check_up_note')->nullable();
			$table->string('check_up_photo',100)->nullable();
			$table->integer('refill');
			$table->string('test_procedures',1024)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prescriptions', function($table) {
			$table->text('procedure');
			$table->text('note');

			$table->dropColumn('parent_id')->nullable();
			$table->dropColumn('test_procedures')->nullable();
			$table->dropColumn('check_up_note')->nullable();
			$table->dropColumn('check_up_photo')->nullable();
		});
	}

}
