<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSittingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sittings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameWebsite' , 30);
            $table->string('linkWebsite' , 128);
            $table->string('Keywords' , 50);
            $table->string('Description' , 128);
            $table->string('socialMidiaFacebook' , 128);
            $table->string('socialMidiaTelegram' , 128);
            $table->string('socialMidiaInstagram' , 128);
            $table->string('socialMidiaYoutube' , 128);
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
        Schema::dropIfExists('sittings');
    }
}
