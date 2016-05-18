<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestoesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questoes', function(Blueprint $table) {
            $table->increments('id');

			$table->integer('prova_id')->unsigned();
			$table->foreign('prova_id')->references('id')->on('provas');
			$table->text('pergunta');
			$table->smallInteger('ordem');
			$table->smallInteger('tipo');
			$table->smallInteger('peso')->nullable();

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questoes');
	}

}
