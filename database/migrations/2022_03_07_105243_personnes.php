<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Personnes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::create('personnes', function (Blueprint $table) {
            $table->id('per_id');
            $table->string('per_nom');
            $table->string('per_prenoms');
            $table->string('per_contact');
            $table->string('per_sexe');
            $table->string('per_age');
            $table->string('per_email');
            $table->string('per_parrain');
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
