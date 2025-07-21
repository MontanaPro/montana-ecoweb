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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column:'customer_id');
            $table->string(column:'province_name');
            $table->string(column:'city_name');
            $table->string(column:'district_name');
            $table->string(column:'subdistrict_name');
            $table->string(column:'zip_code');
            $table->string(column:'full_address');
            $table->string(column:'invoice');
            $table->integer(column:'weight');
            $table->decimal(column:'total',total:8,places:2);
            $table->enum(column:'status',allowed:['pending', 'succes', 'expired', 'failed']) ->default(value:'pending');
            $table->string(column:'snap_token');
            $table->timestamps();

            //relasi table
            $table->foreign(columns: 'customer_id')->references(columns: 'id')->on(table: 'customers')->onDelete(action: 'cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
