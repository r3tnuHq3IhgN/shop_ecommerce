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
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->decimal('regular_price');
            $table->decimal('sale_price');
            $table->string('image');
            $table->string('images')->nullable();
            $table->integer('quantity')->default(10);
            $table->enum('stock_status', ['Còn hàng', 'Hết hàng'])->default('Còn hàng');
            $table->enum('status', [1, 0])->default(1);
            $table->bigInteger('category_id')->unsigned();
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
