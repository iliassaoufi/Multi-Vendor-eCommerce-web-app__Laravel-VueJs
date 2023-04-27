<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();   
            $table->unsignedBigInteger('product_id');
            $table-> foreign('product_id')->references('id')->on('produits')->onUpdate('cascade')->onDelete('cascade');         
            $table->string("value");            
            $table->double('price', 8, 2);
            $table->Integer('quantity');          
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
        Schema::dropIfExists('options');
    }
}
