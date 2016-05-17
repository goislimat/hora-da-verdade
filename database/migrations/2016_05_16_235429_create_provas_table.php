<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('provas', function(Blueprint $table) {
            $table->increments('id');

			$table->integer('disciplina_id')->unsigned();
			$table->foreign('disciplina_id')->references('id')->on('disciplinas');
			$table->string('titulo');
			$table->date('data');
			$table->time('hora_inicio');
			$table->time('hora_final');
			$table->float('pontuacao');
			$table->boolean('notificar');

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
		Schema::drop('provas');
	}

}
