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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('DNI');
            $table->string('nacionality');
            $table->string('cellphone');
            $table->string('bank_account');
            $table->date('birthdate');
            $table->unsignedBigInteger('genre_id');
            $table->string('address');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('title_id');
            $table->double('salary');
            $table->date('hire_date');

            $table->foreign('position_id')
            ->references('id')
            ->on('positions');

            $table->foreign('title_id')
            ->references('id')
            ->on('titles');

            $table->foreign('user_id')
            ->references('id')
            ->on('users');

            $table->foreign('genre_id')
            ->references('id')
            ->on('genres');

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
