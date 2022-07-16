<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
//            Doctor Name	Gender	Area	Classification	Qualification	Speciality	Clinic Address
            $table->string('SrNo');
            $table->string('DoctorName');
            $table->string('Gender');
            $table->string('Area');
            $table->string('Classification');
            $table->string('Qualification');
            $table->string('Speciality');
            $table->string('ClinicAddress');
            $table->string('City');
            $table->string('isActive')->default("1")->comment("0 inactive 1 active");

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
        Schema::dropIfExists('doctors');
    }
}
