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
        
    }
}
