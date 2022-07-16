<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginApiController extends Controller
{
    //

    function login(Request $request)
    {

        $user = User::where('email', $request['email'])->first();

//        die;
        if ($user) {
            if ($user->password) {
                if (Hash::check($request['password'], $user->password)) {
                    $token = $user->createToken('my-app-token')->plainTextToken;
                    $response = [
                        'user' => $user,
                        'token' => $token
                    ];

//                    return json_encode($response,201    );
                    return response(["status" => 200,"data"=>$response, "msg" => "login Successfully"]);
                } else {
                    return response(array("status" => 400, "msg" => "login Unsuccess"));
                }
            } else {
                return response(array("status" => 400, "msg" => "login Unsuccess"));
            }
        } else {
            return response(array("status" => 401, "msg" => "No User Exist"));
        }
    }

    function welcomeApi(){

        echo "Welcome Hear";
    }
}
