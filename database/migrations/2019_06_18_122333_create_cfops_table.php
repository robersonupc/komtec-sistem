<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCFOPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('code');
            $table->integer('numseq');
            $table->string('description');
            $table->string('ent_sai', 1);
            $table->string('operacao', 1);
            $table->string('descr_int')->nullable();
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
        Schema::dropIfExists('cfops');
    }
}
