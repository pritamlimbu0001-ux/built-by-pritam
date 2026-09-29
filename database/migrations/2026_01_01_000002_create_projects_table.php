<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->text('description');
            $table->string('technologies')->nullable();   // comma-separated, e.g. "Laravel,PHP,MySQL"
            $table->string('github_url')->nullable();
            $table->string('live_url')->nullable();
            $table->string('image')->nullable();          // path under storage/app/public/projects
            $table->boolean('featured')->default(false);
            $table->boolean('published')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['published', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
