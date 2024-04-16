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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->unsignedBigInteger('role_id')->required();#unsignedBigInterger solo numeros enteros y positivos (ej: id)
            $table->string('email')->unique();
            $table->date('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->foreign('role_id')
            ->references('id')
            ->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
