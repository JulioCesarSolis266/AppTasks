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
        Schema::create('closures', function (Blueprint $table) {
            $table->id();
            $table->integer('number_visits');
            $table->date('visit_date');
            $table->string('entry_time');
            $table->string('exit_time');
            $table->integer('workers_number');
            $table->text('tasks_details');
            $table->string('hour_cost');
            $table->integer('hours_number');
            $table->string('total');
            $table->string('kilometers_cost');
            $table->integer('roundtrip_kilometers');
            $table->string('total_cost');
            $table->text('other_expenses');
            $table->string('expenses_cost');
            $table->text('material_provided');
            $table->text('material_details');
            $table->integer('quantity');
            $table->text('material_sent');
            $table->unsignedBigInteger('task_id');

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('closure');
    }
};
