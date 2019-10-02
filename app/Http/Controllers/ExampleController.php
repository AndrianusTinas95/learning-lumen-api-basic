<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('age',['only'=>['getUser']]);
        // $this->middleware('age',['except'=>['getUser']]);
    }

    public function key(){
        return uniqid();
    }

    public function foo(){
        return "hallo this is foo";
    }

    public function getUser($id){
        return "User id = $id";
    }
    public function getPost($cat1,$cat2){
        return "Category 1 = $cat1 and Category 2 = $cat2";
    }

    public function getProfile(){
        // return "Route Profile " .route('profile.action');
        echo '<a href="'.route('profile.action').'">Action Link</a>';
    }
    
    public function getProfileAction(){
        return "Route Profile ".route('profile');
    }

    public function fooBar(Request $request){
        // if ($request->is('foo/bar')) {
        //     return "Success";
        // }else{
        //     return "Fail";
        // }
        return $request->method();
    }

    public function userProfile(Request $request){
        // return $request->all();
        // return $request->input('name','TinDev');
        // if($request->has(['name','email'])){
        //      return "Success";
        // }else{
        //     return "Fail";
        // }
        // if($request->filled(['name','email'])){
        //      return "Success";
        // }else{
        //     return "Fail";
        // }
        // return $request->only('username','password');
        return $request->except('username','password');
    }

    public function response(){
        // $data['content']='Data Successful created ! ';
        // return (new Response($data,201))->header('Content-Type','application/json');
        // return response($data,201);
        return response()->json(['message'=>'Fail! Not Found',
        'status'=>false],404);
    }
}
