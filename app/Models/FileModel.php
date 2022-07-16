<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    use HasFactory;
    protected $table="filemanage";
    protected $fillable = ['id','content_name', 'file_path'];


    public function product(){
        $this->hasOne(ProductModels::class,'fileId');
    }
}
