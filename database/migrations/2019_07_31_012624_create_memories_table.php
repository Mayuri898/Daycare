<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('memories', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('header')->nullable();
			$table->date('memoriesdate')->nullable();
			$table->string('description')->nullable();

			$table->string('image')->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('memories');
	}
}
