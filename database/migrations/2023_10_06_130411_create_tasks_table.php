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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('coordinator_id');
            $table->unsignedBigInteger('client_id');
            $table->dateTime('visit_date');
            $table->text('task_details');
            $table->unsignedBigInteger('priority_id');
            $table->unsignedBigInteger('status_id');
            $table->text('other_data');
            $table->unsignedBigInteger('employee_id');


            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('coordinator_id')->references('id')->on('coordinators');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('priority_id')->references('id')->on('task_priorities');
            $table->foreign('status_id')->references('id')->on('task_statuses');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

