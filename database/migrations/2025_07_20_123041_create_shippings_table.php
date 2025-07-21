<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column:'transaction_id');
            $table->string(column:'shipping_courier');
            $table->string(column:'shipping_service');
            $table->decimal(column:'shipping_cost',total:8,places:2);
            $table->timestamps();

            //relasi table
            $table->foreign(columns: 'transaction_id')->references(columns: 'id')->on(table: 'transactions')->onDelete(action: 'cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
