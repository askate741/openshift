<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*信用卡資料表信*/
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->increments('no');/*信用卡編號*/
            $table->char('card_id',16);/*信用卡卡號*/
            $table->string('issue_bank',16);/*發卡銀行*/
            $table->date('exp');/*有限期限*/
            $table->enum('type',["V","M","J","U"]);/*信用卡別*/
            $table->date('donate_start');/*捐款期間-起*/
            $table->date('donate_end');/*捐款期間-迄*/
            $table->integer('donate_times');/*捐款期間-次數*/
            $table->enum('donate_way',["S","M","Y","O"]);/*捐款方式*/
            $table->integer('promise_amount');/*承諾總金額*/
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
        Schema::dropIfExists('credit_cards');
    }
}
