<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
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
            $table->string('Name_ar');
            $table->string('name_en');
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('main_photo');
            $table->json('photos')->nullable();
            $table->string('price');
            $table->string('number_of_calories');
            $table->longtext('description_ar');
            $table->longtext('description_en');
            $table->unsignedBigInteger('category_id')->nullable(); // Add the foreign key column
            $table->foreign('category_id')->references('id')->on('categories'); // Set foreign key constraint
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