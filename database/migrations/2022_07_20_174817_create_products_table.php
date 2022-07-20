<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('category_id');
            $table->foreignId('subcategory_id')->nullable();
            $table->string('slug');
            $table->string('name');
            $table->string('picture_1');
            $table->string('picture_2')->nullable();
            $table->string('picture_3')->nullable();
            $table->string('picture_4')->nullable();
            $table->string('picture_5')->nullable();
            $table->string('condition');
            $table->longText('description');
            $table->integer('price');
            $table->integer('stock');
            $table->integer('weight');
            $table->integer('length');
            $table->integer('width');
            $table->integer('height');
            $table->string('color');
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
};
