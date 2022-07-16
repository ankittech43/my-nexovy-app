<?php

namespace App\Http\Controllers;

use App\Models\DocterModel;
use App\Models\EmpAssignDoc;
use App\Models\EmpAssignPro;
use App\Models\ProductModels;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use File;

class adminController extends Controller
{
    //
    function loginSubmit(Request $request)
    {
        $user = User::where('email', $request['email'])->first();

        if ($user->password) {
            if (!Hash::check($request['password'], $user->password)) {
                return redirect('admin/login');
            } else {
                $request->session()->put('userId', $user->id);
                return redirect('admin/Dashboard');
            }
        } else {
            return redirect('admin/login');
        }
    }

    function EmployeeList()
    {
        if (Session::has('userId')) {
            return view('admin.index_admin');
            // echo "UserList";
        } else {
            return redirect('admin/U');
        }
    }

    function destroy()
    {
        Session::flush();
        return redirect('admin/login');
    }


    function dashboard()
    {
        if (Session::has('userId')) {
            return view('admin.index_admin');
        } else {
            return redirect('admin/login');
        }
    }

    public function viewEmployee()
    {
        if (Session::has('userId')) {
            // return view('admin.employeeList.blade.php');
            //     $docter=DocterModel::with('product')->where('id',1)->get();

            //  dd($docter);
            // echo "<pre>"; ; echo "</pre>";

            $userLists = User::where('isActive', 1)->get();
            return view('admin.employeeList', compact('userLists'));
        } else {
            return redirect('admin/login');
        }
    }

    public function employeeassignProduct($id)
    {
        if (Session::has('userId')) {
            $productList = ProductModels::with('filemodel')->where('isActive', 1)->get();

//            echo "<pre>";print_r($productList->toArray());die;
            $employeeAssignProduct = EmpAssignPro::where('status', 1)->where('uid', $id)->pluck('product_id as product', 'id')->toArray();
            return view('admin.employee-AsssignProduct', compact('productList', 'id', 'employeeAssignProduct'));
        } else {
            return redirect('admin/login');
        }
    }

    public function addEmployee(){

        if (Session::has('userId')) {

            return view('admin.addEmployee');

        }
    }

    public function employeeStore(Request $request){


        $validate=$request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:users',
        ]);

        if ($file = $request->file('profile_image')) {

            $name = $file->getClientOriginalName();
            $filename = $file->getClientOriginalName();
            $picture = rand(10, 10000) . "-" . $filename;
            $current_year = date("Y");
            $current_month = date("M");
            $path = public_path('image/employee/' . $current_year . '/' . $current_month);

            $file->move($path, $picture, filesize(public_path('image')), null, true);
            $profile_image = $current_year . '/' . $current_month . "/" . $picture;

            $validate['profile_image']=$profile_image;

        }

        $validate['password']=Hash::make($request->name.'@1234');

        $validate['type']=3;

        User::create($validate);

        return redirect('admin/viewEmployee');
    }

    public function employeeassignDoctor($id)
    {
        if (Session::has('userId')) {
            $doctorsList = DocterModel::where('isActive', 1)->get();

            $employeeAssignDoctors = EmpAssignDoc::where('status', 1)->where('uid', $id)->pluck('doctorId', 'id')->toArray();
            return view('admin.employee-AsssignDoctor', compact('doctorsList', 'id', 'employeeAssignDoctors'));
            // return view('admin.components');

        } else {
            return redirect('admin/login');
        }
    }

    public function empupdatedoc(Request $request)
    {
        if (Session::has('userId')) {
            $id = $request->id;
            $actiondata = $request->action_data;
            EmpAssignDoc::where('id', $id)->delete();

        } else {
            return redirect('admin/login');
        }

    }

    public function empupdateprod(Request $request)
    {
        if (Session::has('userId')) {
            $id = $request->id;
            $actiondata = $request->action_data;
            EmpAssignPro::where('id', $id)->delete();

        } else {
            return redirect('admin/login');
        }

    }

    function doctorlist()
    {
        if (Session::has('userId')) {

            $doctorList = DocterModel::where('isActive', 1)->get();

            return view('admin.doctor-list', compact('doctorList'));
        } else {
            return redirect('admin/login');
        }
    }

    function changeProfile(Request $request)
    {
        if (Session::has('userId')) {
            //  $data['uid']=Session::get('userId');
            foreach ($request->all() as $key => $value) {
                $data['uid'] = Session::get('userId');
                $data['key'] = $key;
                $data['value'] = $value;
                UserMeta::create($data);
            }

            return redirect('admin.profile');
        } else {
            return redirect('admin/login');
        }
    }

    function profile()
    {
        if (Session::has('userId')) {

            $userDetails = UserMeta::where('uid', Session::get('userId'))->get();
            //   $main_array=$this->array_flatten($userDetails->toArray());
            // echo "<pre>";
            // print_r($userDetails->toArray());
            // echo "</pre>";
            return view('admin.profile', compact('userDetails'));
        } else {
            return redirect('admin/login');
        }
    }


    // function array_flatten($array) {
    //     if (!is_array($array)) {
    //       return FALSE;
    //     }
    //     $result = array();
    //     foreach ($array as $key => $value) {
    //       if (is_array($value)) {
    //         $result = array_merge($result,$this->array_flatten($value));
    //       }
    //       else {
    //         $result[$key] = $value;
    //       }
    //     }
    //     return $result;

    // }


    function addDoctors()
    {
        if (Session::has('userId')) {
            return view('admin.add-doctor-csv');
        } else {
            return redirect('admin/login');
        }
    }

    function addDoctorsSubmit(Request $request)
    {
        if (Session::has('userId')) {

            $city = $request['city'];
            if ($file = $request->file('csv-file')) {

                $name = $file->getClientOriginalName();
                $filename = $file->getClientOriginalName();
                $picture = rand(10, 10000) . "-" . $filename;
                $current_year = date("Y");
                $current_month = date("M");
                $path = public_path('image/patient/' . $current_year . '/' . $current_month);

                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $file->move($path, $picture, filesize(public_path('image')), null, true);
                $picture = $current_year . '/' . $current_month . "/" . $picture;
            }

            $handle = fopen(asset('image/patient/' . $picture), 'r');
            if ($handle) {

                $cnt = 1;
                while ($line = fgetcsv($handle)) {
                    if ($cnt >= 2) {
                        $data['SrNo'] = $line[0];
                        $data['DoctorName'] = $line[1];
                        $data['Gender'] = $line[2];
                        $data['Area'] = $line[3];
                        $data['Classification'] = $line[4];
                        $data['Qualification'] = $line[5];
                        $data['Speciality'] = $line[6];
                        $data['ClinicAddress'] = $line[7];
                        $data['isActive'] = 1;
                        $data['City'] = $city;
                        DocterModel::create($data);
                    }
                    $cnt++;
                }
            }

            return redirect('admin/doctor-list');
        } else {
            return redirect('admin/login');
        }
    }

    function empassigndoc(Request $request)
    {
        if (Session::has('userId')) {
            $data['doctorId'] = $request->did;
            $data['uid'] = $request->uid;
            $data['status'] = $request->action_data;

            $product = EmpAssignDoc::where('uid', $request->uid)->where('doctorId', $request->did)->get();
            if (count($product) <= 0) {
                EmpAssignDoc::create($data);
            }
        } else {
            return response("400");
        }

    }


    function empassignproduct(Request $request)
    {
        if (Session::has('userId')) {
            $data['product_id'] = $request->did;
            $data['uid'] = $request->uid;
            $data['status'] = $request->action_data;



            $product = EmpAssignPro::where('uid', $request->uid)->where('product_id', $request->did)->get();
            if (count($product) <= 0) {
                EmpAssignPro::create($data);
            }
        } else {
            return response("400");
        }
    }
}
