<?php

namespace App\Http\Controllers;

use App\Models\DocterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\FileModel;
use App\Models\ProductModels;
use App\Models\assignProduct as AssignProduct;
use File;

class productController extends Controller
{
    public function index()
    {
        if (Session::has('userId')) {
            $productList = ProductModels::with('filemodel')->get();


            return view('admin.productList', compact('productList'));
        } else {
            return redirect('admin/login');
        }

    }

    public function create()
    {
        if (Session::has('userId')) {
            return view('admin.productCreate');
        } else {
            return redirect('admin/login');
        }

    }

    public function assignProduct($pid)
    {
        if (Session::has('userId')) {
            $usrId = Session::get('userId');
            $product = ProductModels::where('id', $pid)->first();
            $doctorList = DocterModel::where('isActive', 1)->get();

            $dataAssignProduct = AssignProduct::where('uid', Session::get('userId'))
                ->where('pid', $pid)->where('isActive', 1)->pluck('did')
                ->toArray();

            $dataAssignProductByID = AssignProduct::where('uid', Session::get('userId'))
                ->where('pid', $pid)->where('isActive', 1)
                ->pluck('id', 'did')
                ->toArray();

            return view('admin.assignProduct',
                compact('product', 'doctorList', 'pid', 'usrId', 'dataAssignProduct', 'dataAssignProductByID'));


        } else {
            return redirect('admin/login');

        }
    }

    public function assignDoctorsStore(Request $request)
    {
        $productId = $request->productId;
        $docids = $request->doctors;
        foreach ($docids as $dids) {
            $data['uid'] = Session::get('userId');
            $data['pid'] = $productId;
            $data['did'] = $dids;
            $data['isActive'] = 1;

            $assignProduct = AssignProduct::
            where('uid', Session::get('userId'))
                ->where('pid', $productId)
                ->where('did', $dids)->first();

            if ($assignProduct) {
                //    $data1['isActive']=0;
                //    AssignProduct:: where('uid',Session::get('userId'))
                //     ->where('pid',$productId)
                //     ->where('did',$dids)
                //     ->update($data1);
            } else {
                AssignProduct::create($data);
            }

        }
        return redirect('admin/productList');
    }

    public function changeProduct(Request $request)
    {
        $pid = $request->pid;
        $action_data = $request->action_data;
        $data1['isActive'] = $action_data;
        AssignProduct::where('id', $pid)->update($data1);
        $ddrs = AssignProduct::where('id', $pid)->first();
        print_r($ddrs->toArray());
    }

    public function addProduct(Request $request)
    {
        if (Session::has('userId')) {

            $speciality = $request['speciality'];
            $description = $request['description'];

            $validate=$request->validate([
                "speciality"=>"required",
                "description"=>"required",
            ]);

            if ($file = $request->file('add_on_file')) {

                $name = $file->getClientOriginalName();
                $filename = $file->getClientOriginalName();
                $picture = rand(10, 10000) . "-" . $filename;
                $current_year = date("Y");
                $current_month = date("M");
                $path = public_path('image/product/' . $current_year . '/' . $current_month);

                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $file->move($path, $picture, filesize(public_path('image')), null, true);
                $picture = $current_year . '/' . $current_month . "/" . $picture;
            }

            $data_file['file_path'] = $picture;
            $data_file['content_name'] = "Production data";

            $file = FileModel::create($data_file);


            $data['SpacilityType'] = $request->speciality;
            $data['description'] = $request->description;
            $data['isActive'] = 1;
            $data['fileId'] = $file->id;

            ProductModels::create($data);
            return redirect('admin/product');

        } else {
            return redirect('admin/login');
        }
    }
}
