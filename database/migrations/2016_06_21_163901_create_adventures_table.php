<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdventuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('adventures', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
//            $table->string('telegram_user_id');
            $table->string('telegram_chat_id');
            $table->boolean('complete')->defaults(false);
            $table->boolean('active')->defaults(true);
            $table->text('parameters');
            $table->dateTime('last_updated');
            $table->integer('story_id')->unsigned();
//            $table->foreign('story_id')->references('id')->on('stories');
            //current_page
            $table->integer('current_page')->unsigned();
//            $table->foreign('current_page')->references('id')->on('pages');
            //previous_page
            $table->integer('last_page')->unsigned();
//            $table->foreign('last_page')->references('id')->on('pages');
            //last action played
            $table->integer('last_action')->unsigned();
//            $table->foreign('last_action')->references('id')->on('actions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('adventures');
    }
}
