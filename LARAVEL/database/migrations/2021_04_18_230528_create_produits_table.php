<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table-> foreign('store_id')->references('id')->on('stores')->onUpdate('cascade')->onDelete('cascade');
             $table->text('titre');
            $table->Integer('qte');
            $table->double('prix', 8, 2);
            $table->text('shortDescription');
            $table->text('description');
            $table->string('option_name')->nullable();
            $table->string('category_id')->nullable();
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
        Schema::dropIfExists('produits');
       
    }
}
