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
            $table->bigIncrements('id');
            $table->string('code', 45)->unique();
            $table->string('name');
            $table->string('slug');
            $table->decimal('price', 18, 0)->default(0);
            $table->tinyInteger('featured')->unsigned();
            $table->tinyInteger('state')->unsigned();
            $table->text('info')->nullable();
            $table->text('description')->nullable();
            $table->string('image');
            // $table->bigInteger('category_id')->unsigned();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
