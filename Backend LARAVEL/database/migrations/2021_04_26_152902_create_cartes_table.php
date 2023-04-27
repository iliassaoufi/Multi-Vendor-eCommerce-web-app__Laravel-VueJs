<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table-> foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->Integer('statut_achat');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('cartes');
    }
}
