<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) { // TODO dont forget on delete and on update***
            $table->id();
            $table->foreignId('userId')->references('id')->on('users');
            $table->index('userId'); // TODO fix foreign key constraints
            $table->foreignId('parentId')->references('id')->on('users');
            $table->index('userId'); // TODO nullable foreign key
            $table->foreignId('communityId')->references('id')->on('communities');
            $table->index('communityId');
            $table->string('title', 140);
            $table->string('body', 1400)->nullable();
            $table->binary('image')->nullable(); // BLOB equivalent
            $table->string('videoURL', 500)->nullable(); // may use same for video file name
            $table->enum('rating', ['NSFW'])->nullable();
            $table->integer('votesTotal');
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
        Schema::dropIfExists('posts');
    }
}
