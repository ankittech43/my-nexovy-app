<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocterModel extends Model
{
    use HasFactory;

    protected $table="doctors";
    protected $fillable = ['id', 'SrNo','DoctorName', 'Gender', 'Area', 'Classification','Qualification', 'Speciality', 'ClinicAddress','City', 'isActive', 'created_at', 'updated_at'];


    public function product(){
       return $this->hasOne(ProductModels::class,'doctorsId');
    }

//    public function EmpAssignDoc(){
//        return $this->belongsTo(employeassigndoc::class,'doctorId');
//    }
}
