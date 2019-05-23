<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormaPgtosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formapgtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->integer('parcela');
            $table->integer('prazoinicial');
            $table->integer('diasentreparcelas');
            $table->string('url')->unique();
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
        Schema::dropIfExists('formapgtos');
    }
}
