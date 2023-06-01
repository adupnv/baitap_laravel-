<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RectangleController extends Controller
{
    public function index()
    {
        return view('rectangle.index');
    }

    public function clickSquare(Request $request)
    {
        $clickedSquare = $request->square;
        $clickedSquares = session()->get('clicked_squares', []);
        
        if (in_array($clickedSquare, $clickedSquares)) {
            return response()->json(['message' => 'This square has already been clicked.'], 400);
        }

        $clickedSquares[] = $clickedSquare;
        session()->put('clicked_squares', $clickedSquares);

        return response()->json(['message' => 'Square clicked successfully.'], 200);
    }
}
