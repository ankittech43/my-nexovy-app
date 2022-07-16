<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Employee\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*****************ADMIN ROUTES*******************/
Route::group(['middleware' => ['web']], function () {

    Route::Group(['prefix' => 'admin'], function () {

        Route::get('/login', function () {
            return view('admin.login');
        })->name('admin');

        Route::post('/loginsubmit', [adminController::class, 'loginSubmit'])->name('adminLoginSubmit');


        Route::get('/Dashboard',[adminController::class, 'dashboard'])->name('dashboard');
        Route::get('/destroy',[adminController::class, 'destroy'])->name('destroy');
        Route::get('/profile',[adminController::class, 'profile'])->name('profile');
        Route::post('/changeprofile',[adminController::class, 'changeprofile'])->name('changeprofile');

        Route::get('/product',[\App\Http\Controllers\productController::class, 'index'])->name('product');
        Route::get('/productCreate',[\App\Http\Controllers\productController::class, 'create'])->name('createproduct');
        Route::get('/productList',[\App\Http\Controllers\productController::class, 'index'])->name('createList');
        Route::post('/addProduct',[\App\Http\Controllers\productController::class, 'addProduct'])->name('addProduct');
        Route::get('/assignProduct/{pid}',[\App\Http\Controllers\productController::class, 'assignProduct'])->name('assignProduct');
        // Route::get('/profile', function () {  return view('admin.profile');  })->name('profile'); assignDoctorsStore
        Route::post('/assignDoctorsStore',[\App\Http\Controllers\productController::class, 'assignDoctorsStore']);

        Route::post('/changeProduct',[\App\Http\Controllers\productController::class, 'changeProduct']);


        Route::get('/viewEmployee',[\App\Http\Controllers\adminController::class, 'viewEmployee']);

//
//
//        Route::get('/', function () {
//            return view('admin.index_admin');
//        })->name('pagee');
//        Route::get('/appointment-list', function () {
//            return view('admin.appointment-list');
//        })->name('appointment-list');
//        Route::get('/specialities', function () {
//            return view('admin.specialities');
//        })->name('specialities');
//
////        Route::get('/doctor-list', function () {
////            return view('admin.doctor-list');
////        })->name('doctor-list');

        Route::get('/doctor-list',[adminController::class, 'doctorlist'])->name('doctor-list');
        Route::get('/addDoctors',[adminController::class, 'addDoctors'])->name('doctor-add');
        Route::post('/addDoctorsSubmit', [adminController::class, 'addDoctorsSubmit'])->name('addDoctorsSubmit');
        Route::post('/empassigndoc', [adminController::class, 'empassigndoc'])->name('empassigndoc');
        Route::post('/empassignproduct', [adminController::class, 'empassignproduct'])->name('empassignproduct');
        Route::post('/empupdatedoc', [adminController::class, 'empupdatedoc'])->name('empupdatedoc');
        Route::post('/empupdateprod', [adminController::class, 'empupdateprod'])->name('empupdateprod');


        Route::get('/EmployeeassignProduct/{pid}',[adminController::class, 'employeeassignProduct'])->name('EmployeeassignProduct');
        Route::get('/EmployeeassignDoctors/{pid}',[adminController::class, 'employeeassignDoctor'])->name('EmployeeassignDoctor');


        Route::get('/addEmployee',[adminController::class, 'addEmployee'])->name('addEmployee');

        Route::post('/addEmployee',[adminController::class, 'employeeStore'])->name('addEmployee');
//        Route::get('/viewEmployee',[adminController::class, 'employeeassignDoctor'])->name('EmployeeassignDoctor');



        // Route::get('/Users',[adminController::class, 'EmployeeList'])->name('admin-Users');


    });

});


/********************ADMIN ROUTES END******************************/


Route::group(['middleware' => ['web']], function () {

    Route::Group(['prefix' => 'employee'], function () {
        Route::get('/login',[EmployeeController::class,'login'])->name('Employeelogin');
        Route::post('/loginStore',[EmployeeController::class,'loginStore'])->name('checkEmployeelogin');
        Route::get('/allDoctor',[EmployeeController::class,'Employeedoctor'])->name('Employeedoctor');
        Route::get('/allProduct',[EmployeeController::class,'Employeeproduct'])->name('Employeeproduct');
        Route::get('/DoctorList',[EmployeeController::class,'EmployeeDoctorList'])->name('EmployeeDoctorList');
        Route::get('/Doctorbooking/{id}', [EmployeeController::class,'Doctorbooking'])->name('Doctorbooking');
        Route::get('/Productbooking', [EmployeeController::class,'Doctorbooking'])->name('Productbooking');


//            function () {
//            return view('booking');
//        })->name('booking');

    });

});




?>
