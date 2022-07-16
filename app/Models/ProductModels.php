<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModels extends Model
{
    use HasFactory;
    protected $table="product";
    protected $fillable = ['id','SpacilityType', 'fileId', 'description', 'doctorsId', 'isActive'];


    public function assignproduct(){
        return $this->belongsTo(AssignProduct::class,'pid');
    }
    public function empAssignProduct(){
        return $this->hasOne(EmpAssignPro::class,'product');
    }

    public function filemodel(){
        return $this->belongsTo(FileModel::class,'fileId');
    }

//    public function getFilebelong(){
//        return $this->belongsTo(ProductModels::class);
//    }

}

