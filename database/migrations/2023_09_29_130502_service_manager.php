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
        // Create Services table
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->timestamps();
        });
        Schema::create('driver', function (Blueprint $table) {
            $table->id();
            $table->string('cin')->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model');
            $table->integer('year');
            $table->integer('number_wheels');
            $table->decimal('oil_change', 10, 2);

            $table->unsignedBigInteger('vehicle_type_id');
            $table->string('vin')->unique();
            $table->integer('mileage');

            $table->timestamps();

            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
        });
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->text('cin');

            $table->unsignedBigInteger('service_id');
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::create('maintenance_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('diagnostic_emp');
            $table->unsignedBigInteger('driver_id');
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->dateTime('entry_time')->nullable();
            $table->dateTime('leaving_time')->nullable();
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('diagnostic_emp')->references('id')->on('users');
            $table->foreign('driver_id')->references('id')->on('driver');
        });
        Schema::create('maintenance_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maintenance_order_id');
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->text('description');
            $table->timestamps();

            $table->foreign('maintenance_order_id')->references('id')->on('maintenance_orders')->onDelete('cascade');
            $table->foreign('worker_id')->references('id')->on('employees');
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->string('filename');
            // Add other media information fields as needed
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
