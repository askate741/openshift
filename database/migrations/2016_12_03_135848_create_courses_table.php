<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*課程表*/
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('no');/*課程編號*/
            $table->integer('course_type_no');/*課程分類編號*/
            $table->foreign('course_type_no')->references('no')->on('course_types');
            $table->integer('church_no');/*主辦單位*/
            $table->foreign('church_no')->references('no')->on('church');
            $table->integer('member_no');/*牧者同工*/
            $table->foreign('member_no')->references('no')->on('members');
            $table->char('course_name',32);/*課程名稱*/
            $table->date('date_start');/*課程日期-起*/
            $table->date('date_end');/*課程日期-仡*/
            $table->integer('section_count');/*堂數*/
            $table->string('course_memo',64)->nullable();/*備註*/
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
        Schema::dropIfExists('courses');
    }
}
