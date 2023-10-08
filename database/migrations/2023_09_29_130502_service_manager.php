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
            $table->string('name_ar');
            $table->string('name_en');
            $table->timestamps();
        });
        Schema::create('vehicle_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');

            $table->timestamps();
        });
        Schema::create('driver', function (Blueprint $table) {
            $table->id();
            $table->string('cin')->unique();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('phone');
            $table->timestamps();
        });

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
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
        Schema::create('garage', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('address_ar');
            $table->string('address_en');
            $table->string('rows');
            $table->string('columns');
            $table->timestamps();
        });
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('phone');
            $table->text('cin');

            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('garage_id');
            $table->timestamps();

            $table->foreign('garage_id')->references('id')->on('garage');
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::create('maintenance_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('diagnostic_emp');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('garage_id');
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending');
            $table->dateTime('entry_time')->nullable();
            $table->dateTime('leaving_time')->nullable();
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('diagnostic_emp')->references('id')->on('employees'); // Changed 'employee' to 'employees'
            $table->foreign('driver_id')->references('id')->on('driver');
            $table->foreign('garage_id')->references('id')->on('garage');
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->timestamps();
        });



        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name_ar');
            $table->string('product_name_en');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name_ar');
            $table->string('supplier_name_en');
            $table->text('phone')->nullable();
            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->timestamps();
        });
        Schema::create(
            'request_items',
            function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('garage_id');
                $table->unsignedBigInteger('product_id');
                $table->unsignedBigInteger('supplier_id');
                $table->integer('quantity_requested');
                $table->integer('quantity_given');
                $table->enum('state', ['pending', 'confirmed', 'cancelled', 'done'])->default('pending');

                $table->enum('manager_decision', ['pending', 'accepted', 'rejected'])->default('pending');
                $table->enum('accounts_decision', ['pending', 'accepted', 'rejected'])->default('pending');

                $table->timestamps();

                $table->foreign('garage_id')->references('id')->on('garage')->onDelete('cascade');
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
                $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            }
        );
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('garage_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('request_id');
            $table->decimal('price', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->integer('stocked_quantity')->default(0);
            $table->integer('used_quantity')->default(0);
            $table->string('serial_num')->nullable();
            $table->string('rows')->nullable();
            $table->string('columns')->nullable();
            $table->string('reference');
            $table->date('purchase_date');
            $table->date('expiry_date')->nullable();
            $table->timestamps();

            $table->foreign('garage_id')->references('id')->on('garage')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('request_id')->references('id')->on('request_items');
        });






        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maintenance_orders_id');
            $table->unsignedBigInteger('vehicule_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('stock_employee_id');
            $table->unsignedBigInteger('worker_id');
            $table->integer('quantity_taken');
            $table->text('signature')->nullable();
            $table->date('transaction_date');
            $table->timestamps();

            $table->foreign('maintenance_orders_id')->references('id')->on('maintenance_orders');
            $table->foreign('vehicule_id')->references('id')->on('vehicles');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('stock_employee_id')->references('id')->on('employees'); // Changed 'users' to 'employees'
            $table->foreign('worker_id')->references('id')->on('employees');
        });
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');

            $table->unsignedBigInteger('entity_id');
            $table->string('entity_type');
            $table->timestamps();
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
