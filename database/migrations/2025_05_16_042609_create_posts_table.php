<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('caption')->nullable();
            $table->string('img_path')->nullable();
            $table->string('video_path')->nullable();
            $table->integer('upvote')->default(0);
            $table->integer('downvote')->default(0);
            $table->integer('comment_count')->default(0);
            $table->integer('clean_vote')->default(0);
            $table->unsignedBigInteger('location')->nullable();
            $table->string('geo_location')->nullable();
            $table->unsignedBigInteger('topic_id');
            $table->timestamps();
            
            $table->foreign('location')->references('id')->on('regencies')->nullOnDelete();
            $table->foreign('topic_id')->references('id')->on('topics')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
