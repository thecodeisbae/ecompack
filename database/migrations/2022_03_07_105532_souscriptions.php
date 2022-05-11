<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Souscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::create('souscriptions', function (Blueprint $table) {
            $table->id('sous_id');
            $table->unsignedBigInteger('sous_per_id');
            $table->unsignedBigInteger('sous_pack_id');
            $table->boolean('sous_custom_pack')->default(false);
            $table->boolean('sous_flag')->default(false);
            $table->foreign('sous_per_id')->references('per_id')->on('personnes');
            $table->foreign('sous_pack_id')->references('pack_id')->on('packs');
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
