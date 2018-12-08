<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->unique();
            $table->decimal('price_per_unit', 10, 3)->nullable();
            $table->string('unit')->default('piece');
            $table->string('currency')->default('EUR');
            $table->decimal('weight')->nullable();
            $table->string('weight_unit')->default('g');
            $table->string('manufactured_in')->nullable();
            $table->decimal('stock', 15, 3)->default(0);
            $table->longText('description')->nullable();
            $table->string('short_description')->nullable();
            $table->text('extra_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
