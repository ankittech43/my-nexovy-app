<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpAssignPro extends Model
{
    use HasFactory;
    protected $table="employeassignpro";
    protected $fillable = ['uid', 'product_id', 'status'];


    public function  product(){
        return $this->belongsTo(ProductModels::class,'product_id','id');
    }

//    public function getFile(){
//        return $this->hasOneThrough(ProductModels::class,FileModel::class);
//    }
}
