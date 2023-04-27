<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarteItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carte_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produit_id');
            $table-> foreign('produit_id')->references('id')->on('produits')->onUpdate('cascade')->onDelete('cascade');
              $table->unsignedBigInteger('carte_id');
            $table-> foreign('carte_id')->references('id')->on('cartes')->onUpdate('cascade')->onDelete('cascade');
            $table->Integer('qte');
            $table->double('prix', 8, 2);
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
        Schema::dropIfExists('carte_items');
    }
}
