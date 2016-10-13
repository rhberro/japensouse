<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeaUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idea_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idea_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('favourited')->nullable()->default(false);
            $table->boolean('removed')->nullable()->default(false);
            $table->boolean('approved')->nullable()->default(false);
            $table->boolean('preapproved')->nullable()->default(false);
            $table->unique(['idea_id', 'user_id']);
            $table->foreign('idea_id')->references('id')->on('ideas');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('idea_user');
    }
}
