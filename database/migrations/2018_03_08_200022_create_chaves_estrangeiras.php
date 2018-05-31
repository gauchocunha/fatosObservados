<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChavesEstrangeiras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('numeracao', function (Blueprint $table) {
            $table->foreign('idEstudante')->references('id')->on('estudantes');
        });

        Schema::table('fatosObservados', function (Blueprint $table) {
            $table->foreign('idTransgressao')->references('id')->on('transgressoes');
        });

        Schema::table('fatosObservados', function (Blueprint $table) {
            $table->foreign('idEstudante')->references('id')->on('estudantes');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
