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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamp('published_at')->nullable();
            $table->enum('status', ['1','2'])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
