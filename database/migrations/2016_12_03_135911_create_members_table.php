<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*會員資料表*/
        Schema::create('members', function (Blueprint $table) {
            $table->increments('no');/*會員編號*/
            $table->integer('church_no');/*教會編號*/
            $table->foreign('church_no')->references('no')->on('churches');
            $table->integer('credit_card_no')->nullable();/*信用卡編號*/
            $table->foreign('credit_card_no')->references('no')->on('credit_cards')->onDelete('cascade');
            $table->string('devotee_name',32);/*實際奉獻者姓名*/
            $table->string('title',32);/*奉獻收據抬頭*/
            $table->enum('delivery',["Y","M","N"]);/*奉獻收據寄發方式*/
            $table->enum('gender',['M','F']);/*性別*/
            $table->date('birthday')->nullable();/*出生年月日*/
            $table->char('uid',10)->nullable();/*身分證字號*/
            $table->char('member_tel',10)->nullable();/*市話*/
            $table->char('mobile',10)->nullable();/*手機*/
            $table->char('add2_zipcode',5)->nullable()/*通訊郵遞區號*/;
            $table->char('add2_city',4)->nullable();/*通訊縣市*/
            $table->char('add2_dist',8)->nullable();/*通訊鄉鎮市區*/
            $table->string('add2_street',32)->nullable();/*通訊地址*/
            $table->char('add1_zipcode',5)->nullable();/*戶籍郵遞區號*/
            $table->char('add1_city',4)->nullable();/*戶籍縣市*/
            $table->char('add1_dist',8)->nullable();/*戶籍鄉鎮市區*/
            $table->string('add1_street',32)->nullable();/*戶籍地址*/
            $table->string('email',50)->nullable();/*Email*/
            $table->date('date_in');/*入會/到職*/
            $table->date('date_out')->nullable();/*離會/離職 日期*/
            $table->enum('member_type', array("S","L","G","M","C","O"));/*身分類型*/
            $table->timestamps();
        });
        $table_prefix = DB::getTablePrefix();
        DB::statement("ALTER TABLE `" . $table_prefix . "members` CHANGE `member_type` `member_type` SET('S','L','G','M','C','O');");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
