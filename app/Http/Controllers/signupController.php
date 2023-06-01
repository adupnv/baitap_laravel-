<?php

namespace App\Http\Controllers;
use App\Http\Requests;

use App\Http\Requests\signupRequest;

class signupController extends Controller
{
    public function index()
    {
        return view('signup');
    }
    public function displayInfor(signupRequest $Request){
        $user=[
            'name'=>$name=$Request ->input('name'),
            'age'=>$age=$Request ->input('age'),
            'data'=>$data=$Request ->input('data'),
            'phone'=>$phone=$Request ->input('phone'),
            'web'=>$web=$Request ->input('web'),
            'address'=>$address=$Request ->input('address')
        ];
        return view("signup")->with('user',$user);
    }
}
