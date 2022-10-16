<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('site_name' , 50);
            $table->string('href' , 128);
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            // $table->integer('user_id');
            $table->string('title' , 25);
            $table->string('countries' , 25);
            $table->string('keyword' , 25);
            $table->string('tags' , 25);
            $table->string('facebook' , 128);
            $table->string('twitter' , 128);
            $table->string('instagram' , 128);
            $table->string('snapchat' , 128);
            $table->string('youtube' , 128);
            $table->string('telegram' , 128);
            $table->string('android' , 128);
            $table->string('ios' , 128);




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
        Schema::dropIfExists('sites');
    }
}
