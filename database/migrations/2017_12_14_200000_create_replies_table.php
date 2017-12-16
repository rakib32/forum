<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('content');
            $table->integer('topic_id')->unsigned();
            $table->integer('created_by_user_id')->unsigned();
            $table->integer('parent_reply_id')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('replies', function(Blueprint $table) {
            $table->foreign('topic_id')->references('id')->on('topics');
            $table->foreign('created_by_user_id')->references('id')->on('users');
            $table->foreign('parent_reply_id')->references('id')->on('replies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
