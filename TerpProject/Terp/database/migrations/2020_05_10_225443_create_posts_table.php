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
        Schema::create('posts', function (Blueprint $table) { // TODO check tables all work
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('parentId')->nullable();
            $table->unsignedBigInteger('communityId');
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
