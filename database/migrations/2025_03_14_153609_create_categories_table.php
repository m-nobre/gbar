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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->foreignId('parent_category_id')->nullable()->constrained( table: 'categories', indexName: 'id');
            $table->foreignId('category_type_id')->constrained();
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->boolean('standalone')->nullable();
            $table->integer('priority')->nullable();
            $table->json('data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
