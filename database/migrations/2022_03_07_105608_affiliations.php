<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Affiliations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::create('affiliations', function (Blueprint $table) {
            $table->id('aff_id');
            $table->unsignedBigInteger('aff_per_id');
            $table->unsignedBigInteger('aff_parrain_id');
            $table->float('aff_gain');
            $table->foreign('aff_per_id')->references('per_id')->on('personnes');
            $table->foreign('aff_parrain_id')->references('per_id')->on('personnes');
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
