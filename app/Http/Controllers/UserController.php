<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id){
        $user = User::find($id);

        if($user){
        
            return response()->json([
                'success'   => true,
                'message'   => 'User Found',
                'data'      => $user,
            ],302);
           
        }else{

            return response()->json([
                'success'   => false,
                'message'   => 'User Fail',
                'data'      => '',
            ],404);

        }

    }

    
}
