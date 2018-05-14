<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\User;

class UserOutController extends Controller
{
   


public function Register(Request $request){ 
  
////////////////////genera tokens
     $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'owner_id' => 'required',
        'owner_user_id' => 'required',
        'package_id' => 'required',
        'user_type_id' => 'required',
    ]);

      
   
    if ($validator->fails()) {
        return response()->json(['error Usuario ya Existe'=>$validator->errors()], 422);
    }else{
   
    $input = $request->all();
    
    $input['password'] = bcrypt($request->get('password'));
    $user = User::create($input);
    $token =  $user->createToken('MyApp')->accessToken;

     
   

    return response()->json([
        'token' => $token,
        'user' => $user,
    ], 200);
    }

}

///////login  

public function login(Request $request)
{
    $aut=Auth::attempt($request->only('email', 'password'));
     
    if ($aut) {
        $user = Auth::user();
        $token =  $user->createToken('MyApp')->accessToken;
        return response()->json([
            'token' => $token,
            'user' => $user,
        ], 200);
    } else {
        return response()->json(['error usuario no Existe' => 'Unauthorised'], 401);
    }
}

/////////////consumir
public function Profile()
{
         $user = Auth::user();
    return response()->json(compact('user'), 200);

}
