<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpAssignDoc extends Model
{
    use HasFactory;

    protected $table="employeassigndoc";
    protected $fillable = ['uid', 'doctorId', 'status'];

    public function doctors(){
        return $this->hasOne(DocterModel::class,'id');
    }

}
