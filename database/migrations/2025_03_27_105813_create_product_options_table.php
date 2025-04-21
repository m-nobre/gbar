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
        Schema::create('product_options', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('price', total: 8, places: 2)->nullable();
            $table->string('measure')->nullable();
            $table->string('string')->nullable();
            $table->integer('integer')->nullable();
            $table->decimal('decimal', total: 8, places: 2)->nullable();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('product_id')->constrained()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_options');
    }
};
