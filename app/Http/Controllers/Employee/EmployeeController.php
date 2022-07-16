<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\DocterModel;
use App\Models\EmpAssignDoc;
use App\Models\EmpAssignPro;
use App\Models\FileModel;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    function __construct()
    {

    }

    public function login()
    {

        return view('login');
    }

    public function loginStore(Request $request)
    {

        //    $validate= $this->validate($request,[
        //         'username'=>'required',
        //         'password'=>'required'
        //      ]);

        //      if($validate){
        //        echo"<pre>";  print_r($validate);  echo"</pre>";
        //          die;
        //      }

        $user = User::where('email', $request->username)->first();
        if ($user) {
            if ($user->password) {
                if (!Hash::check($request['password'], $user->password)) {
                    return redirect('employee/login');
                } else {
                    $request->session()->put('userId', $user->id);
                    return redirect('employee/allDoctor');
                }
            } else {
                return redirect('employee/login');
            }
        } else {
            return redirect('employee/login');
        }
    }

    function Employeedoctor()
    {
        if (Session::get('userId')) {

            $doctorList = EmpAssignDoc::    where('employeassigndoc.uid', Session::get('userId'))->with('doctors')->get();
            $doctorSpeciality = DocterModel::select('Speciality')->groupby('Speciality')->get();
            $doctorArea = DocterModel::select('Area')->groupby('Area')->get();
            return view("EmployeesDoctors", compact('doctorList', 'doctorSpeciality', 'doctorArea'));

        } else {
            return redirect('employee/login');
        }
    }

    function EmployeeProduct()
    {
        if (Session::get('userId')) {

            $productList = EmpAssignPro::
            where('employeassignpro.uid', Session::get('userId'))->with('product')->get();

            foreach ($productList as $list) {
                $list->fileDetails = FileModel::where('id', $list->product['fileId'])->first();
            }


            return view("EmployeesProduct", compact('productList'));

        } else {
            return redirect('employee/login');
        }
    }

    function Doctorbooking($id)
    {
        if (Session::get('userId')) {

            $id=Session::get('userId');

                  $doctors=EmpAssignDoc::where('doctorId',$id)->with('doctors')->first();

//                 echo "<pre>";print_r($doctors);die;

                 $product=EmpAssignPro::where('uid',Session::get('userId'))->with('product')->get();


            return view('SetProductesforDoctor',compact('doctors','product'));
//            return view('blog-grid');
        } else {
            return redirect('employee/login');
        }
    }

    function Productbooking()
    {
        if (Session::get('userId')) {
            return view('booking');
        } else {
            return redirect('employee/login');
        }
    }

    function EmployeeDoctorList()
    {
        if (Session::get('userId')) {
            $doctorsList = DocterModel::where('isActive', 1)->get();
            return view('EmployeeDoctorList', compact('doctorsList'));
        } else {
            return redirect('employee/login');
        }
    }

}
