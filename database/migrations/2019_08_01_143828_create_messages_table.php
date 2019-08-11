<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('messages', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->integer('student_id')->nullable();
			$table->integer('teacher_id')->nullable();
			$table->date('messagedate')->nullable();
			$table->string('messagestime')->nullable();
			$table->text('messages')->nullable();
			$table->string('mobileno')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('messages');
	}
}
