<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use Illuminate\Support\Facades\Route;


class UserController extends Controller
{
    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    /*function register(Request $request) {

    	$request->validate([
    		"name" =>'required|string',
    		"email"=>'required|string',
    		"password"=> 'required|string|min:6',
    		"role"=>'required|string'
    	]);
    	$user=new User([
    		'name' =>$request->name,
    		'email'=>$request->email,
    		'passeword'=>Hash::make($request->password),
    		'role'=>$request->role,
    	]);
    	$user->save();
    	return response()->json(['message'=>'user has been registered'],200);
    }*/
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }
    
    public function userProfile()
    {
        return response()->json(auth()->user());
    }
    public function GetUserById($id)
    {
        $user=User::find($id);
       return  response()->json( $user );
    }
    
    public function UpdateUserRole(Request $request , $id){
    
        $user=User::find($id);
    	$user->role = $request->role;

            $result=$user->save();
            if($result){
            	return "user role updated";
            }
            else{
            	return "user role not updated";
            }
    }
    
}
