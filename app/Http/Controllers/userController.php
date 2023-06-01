<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function xinchao(){
        $title="đây là một cái tiêu đề";
        $huu="nếu là anh";
        // return view("test")->with(['title'=> $title , 'huu'=>$huu]);
        $arr=['title'=>$title,'huu'=>$huu];
        return view("test")->with('context',$arr);
    }
}
