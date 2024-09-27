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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('channel_id');
            $table->string('title');
            $table->text('description');
            $table->string('uid');
            $table->string('thumbnail_image');
            $table->text('path')->nullable();
            $table->string('proccessed_file')->nullable();
            $table->enum('visibility', ['private', 'public', 'unlisted'])->default('private');
            $table->boolean('proccessed')->default(false);
            $table->boolean('allow_likes')->default(false);
            $table->boolean('allow_comments')->default(false);
            $table->string('proccessing_percentage')->default(false);

            $table->foreign('channel_id')
                ->references('id')->on('channels')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
