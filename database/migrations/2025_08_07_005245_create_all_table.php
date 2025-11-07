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
        Schema::create('category', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('discount')->default(0);
            $table->integer('stock')->default(0);
            $table->foreignId('category_id')->constrained('category')->onDelete('restrict');
            $table->timestamps();
        });

        Schema::create('user_cart', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('product')->onDelete('restrict');
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->integer('quantity')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->dateTime('date_time');
            $table->decimal('total', 10, 2);
            $table->integer('paid')->default(0);
            $table->string('paid_by')->nullable();
            $table->string('paid_ref')->nullable();
            $table->string('delivery_by')->nullable();
            $table->timestamps();
        });

        Schema::create('order_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('order')->onDelete('restrict');
            $table->foreignId('product_id')->constrained('product')->onDelete('restrict');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });

        Schema::create('slider',function (Blueprint $table){
           $table->id();
           $table->string('title');
           $table->text('description')->nullable();
           $table->string('link')->nullable();
           $table->text('image');
           $table->tinyInteger('order');
           $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
        Schema::dropIfExists('product');
        Schema::dropIfExists('user_cart');
        Schema::dropIfExists('order');
        Schema::dropIfExists('order_detail');
        Schema::dropIfExists('slider');
    }
};
