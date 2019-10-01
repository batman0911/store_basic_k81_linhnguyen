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
            $table->string('code', 45);
            $table->string('name');
            $table->string('slug');
            $table->decimal('price', 18);
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('state')->default(0);
            $table->text('info');
            $table->text('description');
            $table->string('image');
            // $table->bigInteger('category_id')->unsigned();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
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
