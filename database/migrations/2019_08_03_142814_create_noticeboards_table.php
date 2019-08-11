<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeboardsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('noticeboards', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('header')->nullable();
			$table->date('todaysdate')->nullable();
			$table->string('noticedescription')->nullable();
			$table->string('writetime')->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('noticeboards');
	}
}
