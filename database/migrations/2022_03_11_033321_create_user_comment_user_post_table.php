<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCommentUserPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_comment_user_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_post_id');
            $table->unsignedBigInteger('user_comment_id');
            $table->timestamps();

            $table->foreign('user_post_id')->references('id')->on('user_posts')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('user_comment_id')->references('id')->on('user_comments')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_comment_user_post');
    }
}
