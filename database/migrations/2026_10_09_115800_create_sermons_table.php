<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sermons', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->string('scripture_reference', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('preacher', 255)->nullable();
            $table->string('category', 255)->nullable();
            $table->date('sermon_date')->nullable();
            $table->string('video_url', 500)->nullable();
            $table->string('audio_url', 500)->nullable();
            $table->string('thumbnail_path', 255)->nullable();
            $table->boolean('is_published')->default(false)->index();
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamps();

            $table->index(['title', 'preacher']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sermons');
    }
};
