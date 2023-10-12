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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->required();
            $table->string('email')->required()->unique();
            $table->string('phone_number')->required()->unique();
            $table->string('address')->required();
            $table->string('city_country')->required();
            $table->unsignedBigInteger('company_id')->required();#unsignedBigInterger solo numeros enteros y positivos (ej: id)

            $table->foreign('company_id')
            ->references('id')
            ->on('companies')
            ->onDelete('cascade');#Esto es para que el company_id debe ser un id existente en companies
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
