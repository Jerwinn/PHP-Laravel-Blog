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
        Schema::create('comment_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posts_id')->unique();
            $table->unsignedBigInteger('comments_id')->unique();
            $table->timestamps();

            //$table->foreign('comments_id')->references('id')->on('comments')
              //  ->onDelete('cascade')->onUpdate('cascade');

            //$table->foreign('posts_id')->references('id')->on('posts')
              //  ->onDelete('cascade')->onUpdate('cascade');






        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_post');
    }
}
