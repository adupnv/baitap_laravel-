<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sumController extends Controller
{
    public function index()
    {
        return view('sum');
    }
    public function tinhtong(Request $request)
    {
        $sum= $request->soA +$request->soB;
        return view('sum',compact('sum'));
    }
}
