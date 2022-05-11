<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Retraits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::create('retraits', function (Blueprint $table) {
            $table->id('retrait_id');
            $table->unsignedBigInteger('retrait_per_id');
            $table->string('retrait_montant');
            $table->boolean('retrait_flag');
            $table->foreign('retrait_per_id')->references('per_id')->on('personnes');
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
        //
    }
}
