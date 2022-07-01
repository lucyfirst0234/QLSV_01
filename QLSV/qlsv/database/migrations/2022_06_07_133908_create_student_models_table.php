<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_models', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 30)->nullable(false);
            $table->date('DOB')->default('2000-01-01');
            $table->boolean('sex')->default(true);
            $table->string('address', 100)->nullable(true);
            $table->string('hometown', 100)->nullable(true);
            $table->string('email', 150)->unique();
            $table->string('facebook', 200)->nullable(true);
            $table->bigInteger('hobbies')->default(0);
            $table->unsignedBigInteger('class_id');
            $table->string('username', 30);
            $table->string('password', 255);
            $table->string('favourite_color', 7)->default('#000000');
            $table->text('description')->nullable(true);
            $table->foreign('class_id')->references('id')->on('class_models')->onDelete('cascade');


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
        Schema::dropIfExists('student_models');
    }
}
