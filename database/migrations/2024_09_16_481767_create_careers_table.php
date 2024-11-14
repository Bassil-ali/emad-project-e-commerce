<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.6.8 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.6.8 | https://it.phpanonymous.com]
class CreateCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Full_Name');
            $table->string('Nationality');
            $table->string('Occupation')->nullable();
            $table->string('Current_Location')->nullable();
            $table->string('Age')->nullable();
            $table->string('Mobile_Number')->nullable();
            $table->string('Email')->nullable();
            $table->string('Landline_Number')->nullable();
            $table->string('Occupation_Interest')->nullable();
            $table->string('attach_cv');
            $table->longtext('message')->nullable();
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
        Schema::dropIfExists('careers');
    }
}