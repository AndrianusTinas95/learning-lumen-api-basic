<?php

namespace App\Http\Controllers;

use App\User;
use ExampleTest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        try {
            $register = User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);
            
            return response()->json([
                'success'   => true,
                'message'   => 'Register Success',
                'data'      => $register,
            ],201);

        } catch (Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => 'Register Fail',
                'data'      => $e->getMessage(),
            ],400);
        }
       
    
    }

    public function login(Request $request){
        try {
            $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email',$email)->first();

        if($user && Hash::check($password,$user->password)){
            $apiToken = base64_encode(uniqid().uniqid().uniqid().uniqid());

            $user->update([
                'api_token' =>$apiToken
            ]);

            return response()->json([
                'success'   => true,
                'message'   => 'Login Success',
                'data'      => [
                    'user'      => $user,
                    'api_token' => $apiToken
                ],
            ],201);
        
        }else{
        
            return response()->json([
                'success'   => false,
                'message'   => 'Login Fail',
                'data'      => 'Email Or Password False',
            ],400);
        
        }

        } catch (Exception $e) {
        
            return response()->json([
                'success'   => false,
                'message'   => 'Login Fail',
                'data'      => $e->getMessage(),
            ],400);
        
        }
    }
}
