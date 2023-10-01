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

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->text('contact_info')->nullable();
            $table->timestamps();
        });
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('supplier_id');
            $table->decimal('price', 10, 2);
            $table->integer('stocked_quantity')->default(0);
            $table->integer('used_quantity')->default(0);
            $table->string('serial_num')->nullable();
            $table->string('location')->nullable();
            $table->string('reference');
            $table->date('purchase_date');
            $table->date('expiry_date')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });



        Schema::create('request_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('supplier_id');
            $table->integer('quantity_requested');
            $table->enum('state', ['pending', 'confirmed', 'cancelled', 'done'])->default('pending');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });

        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maintenance_orders_id');
            $table->unsignedBigInteger('vehicule_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('stock_employee_id');
            $table->unsignedBigInteger('employee_id');
            $table->integer('quantity_taken');
            $table->text('signature')->nullable();
            $table->date('transaction_date');
            $table->timestamps();

            $table->foreign('maintenance_orders_id')->references('id')->on('maintenance_orders');
            $table->foreign('vehicule_id')->references('id')->on('vehicles');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('employee_id')->references('id')->on('users');
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
