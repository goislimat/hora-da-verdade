<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpcoesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('opcoes', function(Blueprint $table) {
            $table->increments('id');

			$table->integer('questao_id')->unsigned()->nullable();
			$table->foreign('questao_id')->references('id')->on('questoes');
			$table->text('texto');
			$table->smallInteger('ordem');

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
		Schema::drop('opcoes');
	}

}
