<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*帳務表*/
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('no');/*帳務編號*/
            $table->integer('member_no')->nullable();/*會員編號*/
            $table->foreign('member_no')->references('no')->on('members');
            $table->integer('account_class_no')->nullable();/*會計科目編號*/
            $table->foreign('account_class_no')->references('no')->on('account_classes');
            $table->date('account_date');/*日期*/
            $table->string('account_memo',64)->nullable();/*摘要*/
            $table->integer('account_amount');/*金額*/
            $table->enum('cert_type',["C","B","P","S"]);/*收支流向*/
            $table->string('cert',32);/*收支憑證*/
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
        Schema::dropIfExists('accounts');
    }
}
