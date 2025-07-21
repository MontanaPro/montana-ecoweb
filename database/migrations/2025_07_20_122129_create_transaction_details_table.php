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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'transaction_id');
            $table->unsignedBigInteger(column: 'product_id');
            $table->integer(column:'qty');
            $table->integer(column:'price');
            $table->timestamps();

            //relasi table
            $table->foreign(columns: 'transaction_id')->references(columns: 'id')->on(table: 'transactions')->onDelete(action: 'cascade');
            $table->foreign(columns: 'product_id')->references(columns: 'id')->on(table: 'products')->onDelete(action: 'cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
