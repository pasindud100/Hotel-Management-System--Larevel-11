<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // get all rooms
    public function index()
    {
        $rooms = Room::all();
        $hotels = Hotel::pluck('name', 'id'); 

        return view('rooms.index', compact('rooms', 'hotels'));
    }

    // creating a new room
    public function create()
    {
        $hotels = Hotel::pluck('name', 'id');
        return view('rooms.create', compact('hotels'));
    }

    // Store a new room
    public function store(Request $request)
    {
        // validting the request
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'qty' => 'required',
            'hotel_id' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // check image is uploaded is not
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->store('images', 'public');
            $validateData['image'] = $fileName;
        }
        Room::create($validateData);
        return redirect()->route('rooms.index')->with('success', 'Room created successfully');
    }

    // this for the form for editing a room
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $hotels = Hotel::pluck('name', 'id'); // get hotels for the dropdown
        return view('rooms.edit', compact('room', 'hotels'));
    }

    // update a room
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
    
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'qty' => 'required',
            'hotel_id' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->store('images', 'public');
            $validateData['image'] = $fileName;
        }
    
        $room->update($validateData);
    
        // redirect  to the edit page with success message whwnedit success
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully');
    }

    // this for delete a room
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully');
    }
}