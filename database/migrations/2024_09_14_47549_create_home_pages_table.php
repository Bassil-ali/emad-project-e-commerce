<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class CreateHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_title_ar');
            $table->longtext('description_ar');
            $table->string('second_title_ar');
            $table->string('YouTupe_url')->nullable();
            $table->string('workers');
            $table->bigInteger('certificates');
            $table->bigInteger('clients');
            $table->string('first_title_en');
            $table->longtext('description_en');
            $table->string('second_title_en')->nullable();
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
        Schema::dropIfExists('home_pages');
    }
}