<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->integer('follower_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->unique(['follower_id', 'user_id']);
            $table->foreign('follower_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('created_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('follows');
    }
}
