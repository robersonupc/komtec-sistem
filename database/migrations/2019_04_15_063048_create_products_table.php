<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');                        
            $table->string('code')->unique();
            $table->unsignedInteger('ncm_id');
            $table->unsignedInteger('category_id');            
            $table->unsignedInteger('brand_id');
            $table->string('codeManufacturer')->unique();           
            $table->string('url')->unique();
            $table->double('pricePurchase', 10, 2);   
            $table->integer('margin');         
            $table->double('priceSale', 10, 2);
            $table->text('note')->nullable();
            $table->integer('qty');
            
            $table->foreign('ncm_id')->references('id')->on('ncms')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
