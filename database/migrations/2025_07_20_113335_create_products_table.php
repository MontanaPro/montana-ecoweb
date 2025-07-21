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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column:'category_id');
            $table->string(column:'image');
            $table->string(column:'title');
            $table->string(column:'slug');
            $table->string(column:'description');
            $table->string(column:'specification');
            $table->string(column:'garansi');
            $table->string(column:'video');
            $table->integer(column:'price');
            $table->integer(column:'weight');
            $table->timestamps();

            // definisikan foreign key relasi table kategori
            $table->foreign(columns: 'category_id')->references(columns: 'id')->on(table:'categories')->onDelete(action: 'cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
