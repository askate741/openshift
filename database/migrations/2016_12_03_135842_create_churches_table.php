<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChurchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*教會名錄表*/
        Schema::create('churches', function (Blueprint $table) {
            $table->increments('no');/*編號*/
            $table->string('church_name',50);/*名稱*/
            $table->char('add_zipcode',5);/*通訊郵遞區號*/
            $table->char('add_city',4);/*通訊縣市*/
            $table->char('add_dist',8);/*通訊鄉鎮市區*/
            $table->string('add_street',32);/*通訊地址*/
            $table->char('church_tel',10);/*電話號碼*/
            $table->char('ext',5)->nullable();/*分機號碼*/
            $table->string('web_or_mail',50)->nullable();/*網站or信箱*/
            $table->char('contact',16)->nullable();/*連絡人*/
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
        Schema::dropIfExists('churches');
    }
}
