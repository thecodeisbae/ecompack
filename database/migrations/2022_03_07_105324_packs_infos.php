<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PacksInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::create('packs_infos', function (Blueprint $table) {
            $table->id('packinfo_id');
            $table->unsignedBigInteger('packinfo_pack_id');
            $table->unsignedBigInteger('packinfo_article_id');
            $table->foreign('packinfo_pack_id')->references('pack_id')->on('packs');
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
