<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\DocterModel;
use App\Models\EmpAssignDoc;
use App\Models\EmpAssignPro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeApiController extends Controller
{
    public function doctorList()
    {

        try {
            $uid = Auth::user()->id;
            $doctorList = EmpAssignDoc::where('uid', $uid)->paginate(5);

            return response(["status" => 200, "data" => $doctorList->items(), 'total_page' => $doctorList->lastPage(), "msg" => "DoctorList Successfully"]);
        } catch (\Exception $e) {

        }
   }

   public function productList(){
       $uid = Auth::user()->id;
       $productList = EmpAssignPro::where('uid', $uid)->paginate(5);

       return response(["status" => 200, "data" => $productList->items(), 'total_page' => $productList->lastPage(), "msg" => "ProductList Successfully"]);

   }
}
