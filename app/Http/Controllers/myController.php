<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myController extends Controller
{
    public function index()
    {
        return view('ket_qua');
    }
    function tong(Request $request)
    {
        $first = $request->input('firstNumber');
        $second = $request->input('secondNumber');
        $tinh = $request->input('operator');

        switch ($tinh) {
            case '+':
                $result = $first + $second;
                break;
            case '-':
                $result = $first - $second;
                break;
            case '*':
                $result = $first * $second;
                break;
                case '/':
                    $result = $first / $second;
                    break;
        }
        return view('ket_qua', [
            'result' => $result
        ]);
    }
}