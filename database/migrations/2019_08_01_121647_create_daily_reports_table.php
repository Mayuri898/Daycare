<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('daily_reports', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->date('report_date')->nullable();
			$table->string('from_time')->nullable();
			$table->string('to_time')->nullable();
			$table->text('description')->nullable();
			$table->string('mood')->nullable();

			$table->bigInteger('category_id')->unsigned()->nullable();

			$table->timestamps();

			$table->foreign('category_id')->references('id')->on('report_categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('daily_reports');
	}
}
