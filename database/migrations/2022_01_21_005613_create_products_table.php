<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('slug')->unique();
            $table->json('description')->nullable();
            $table->double('price');
            $table->string('feature')->nullable();
            $table->unsignedBigInteger('quantity')->default(0);
            $table->boolean('status')->default(false);
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('subcategory_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->foreignId('child_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->foreignId('subchild_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}