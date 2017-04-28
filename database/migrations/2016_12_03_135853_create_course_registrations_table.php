<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*修課紀錄表*/
        Schema::create('course_registrations', function (Blueprint $table) {
            $table->increments('no');/*修課編號*/
            $table->integer('member_no');/*會員編號*/
            $table->foreign('member_no')->references('no')->on('members');
            $table->integer('course_type_no');/*課程分類編號*/
            $table->foreign('course_type_no')->references('no')->on('courses');
            $table->integer('course_no');/*課程編號*/
            $table->foreign('course_no')->references('no')->on('courses');
            $table->integer('people_count');/*参與人數*/
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
        Schema::dropIfExists('course_registrations');
    }
}
