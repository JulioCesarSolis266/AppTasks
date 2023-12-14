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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('closure_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedDecimal('count');
            $table->timestamps();

            $table->foreign('closure_id')->references('id')->on('closures')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('costs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
