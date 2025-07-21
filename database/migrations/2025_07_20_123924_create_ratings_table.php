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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column:'transaction_detail_id');
            $table->unsignedBigInteger(column:'customer_id');
            $table->unsignedBigInteger(column:'product_id');
            $table->integer(column:'rating');
            $table->text(column:'review');
            $table->timestamps();

            //relasi table
            $table->foreign(columns: 'transaction_detail_id')->references(columns: 'id')->on(table: 'transaction_details')->onDelete(action: 'cascade');
            $table->foreign(columns: 'customer_id')->references(columns: 'id')->on(table: 'customers')->onDelete(action: 'cascade');
            $table->foreign(columns: 'product_id')->references(columns: 'id')->on(table: 'products')->onDelete(action: 'cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
