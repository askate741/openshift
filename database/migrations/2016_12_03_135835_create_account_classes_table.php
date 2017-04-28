<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*會計科目表*/
        Schema::create('account_classes', function (Blueprint $table) {
            $table->increments('no');/*會計科目表*/
            $table->integer('subclass1_no');/*科目編號1*/
            $table->foreign('subclass1_no')->references('no')->on('sub1classes');
            $table->integer('subclass2_no');/*科目編號2*/
            $table->foreign('subclass2_no')->references('no')->on('sub2classes');
            $table->enum('class',["0","1"]);/*科目分類*/
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
        Schema::dropIfExists('account_classes');
    }
}
