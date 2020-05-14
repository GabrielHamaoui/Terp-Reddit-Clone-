<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votes', function (Blueprint $table){
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->index('userId');
            $table->foreign('postId')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
            $table->index('postId');
            $table->unique(['userId', 'postId']);
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('fromUserId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->index('fromUserId');
            $table->foreign('toUserId')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
            $table->index('toUserId');
        });

        Schema::table('subscriptions', function (Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->index('userId');
            $table->foreign('communityId')->references('id')->on('communities')->onDelete('cascade')->onUpdate('cascade');
            $table->index('communityId');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('userId')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
            $table->index('userId');
            $table->foreign('parentId')->references('id')->on('users')->onDelete('no action')->onUpdate('cascade');
            $table->index('parentId');
            $table->foreign('communityId')->references('id')->on('communities')->onDelete('cascade')->onUpdate('cascade');
            $table->index('communityId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // if need to drop, drop with refresh or manually
        // if absolutely need to, use code
    }
}
