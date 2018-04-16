<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolledCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolled_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->string('coupon_code');
            $table->string('course_enroll_status');
            $table->timestamps();

//            $table->primary(['customer_id', 'course_id']);

            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('restrict');

            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolled_courses');
    }
}
