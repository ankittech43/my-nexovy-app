<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeAssignDocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeAssignDoc', function (Blueprint $table) {
            $table->id();
            $table->integer('uid')->unsigned()->comment("employee ids");
            $table->integer('doctorId')->unsigned();
            $table->integer('status')->default('1')->comment("1 Active 0 Deactive");
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
        Schema::dropIfExists('employeAssignDoc');
    }
}
