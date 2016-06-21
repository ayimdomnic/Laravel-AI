<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('action_id');
            $table->string('name');
            $table->string('description'); //maybe
            $table->enum('type',['go','back','wait','end','start','input','option','update']);
            $table->text('parameters'); //for storing info if required
            $table->text('keyboard'); //for storing keyboard setup
            $table->integer('page_id')->unsigned();
            $table->foreign('page_id')->references('id')->on('pages');
            $table->integer('next_page')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('actions');
    }
}
