<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Requests\CreateRequest;

class RoomController extends Controller
{
    public function create(CreateRequest $request)
    {
        $rooms = Room::all();
        return view('create', compact('rooms'));
    }

    public function store(CreateRequest $request)
    {
        $room = Room::create([
            'room_name' => $request->input('roomname'),
            'description' => $request->input('des'),
            'price' => $request->input('price'),
            'image' => $request->input('img')
        ]);
        
        $rooms = Room::all();
        return view('create', compact('rooms'));
    }
}
