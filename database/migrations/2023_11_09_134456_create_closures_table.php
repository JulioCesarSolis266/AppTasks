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
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('products_details_id');
            $table->integer('visits');
            $table->date('visit_date');
            $table->time('entry_time');
            $table->time('exit_time');
            $table->integer('workers_count');
            $table->text('tasks_done');
            $table->unsignedBigInteger('hour_cost_id');
            $table->integer('hours_count');
            $table->unsignedDecimal('total_hours');
            $table->unsignedBigInteger('km_cost_id');
            $table->unsignedDecimal('roundtrip_kms');
            $table->unsignedDecimal('total_kms');
            $table->unsignedDecimal('subtotal_cost');
            $table->unsignedDecimal('total_cost');

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->foreign('products_details_id')->references('id')->on('closures')->onDelete('cascade');
            $table->foreign('hour_cost_id')->references('id')->on('costs')->onDelete('cascade');
            $table->foreign('km_cost_id')->references('id')->on('costs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('closures');
    }
};
