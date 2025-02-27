<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    

    protected $room;

    public function __construct()
    {
        $this->room = new Room();
    }

    // get all rooms to display in the table
    public function index()
    {
        $rooms = $this->room->all();
        $hotels = Hotel::pluck('name', 'id');

        return view('rooms.index', compact('rooms','hotels'));

    }

    // this for store a new hotel
    public function store(Request $request)
    {
        // validate the request
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'qty'=>'required',
            'hotel_id'=>'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // checking  an image is uploaded
        if ($request->hasFile('image')) {
            // this store the image in the public/images file
            $fileName = $request->file('image')->store('images', 'public');
            $validateData['image'] = $fileName;
        }

        // create the hotel
        Room::create($validateData);
        // sending back with success message
        return redirect()->back()->with('success', 'Room
         created successfully');
    }

    // thi edit a hotel
    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('hotels.edit', compact('hotel'));
    }


    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->store('images', 'public');
            $validateData['image'] = $fileName;
        }

        // update the hotel
        $hotel->update($validateData);
        return redirect()->route('hotels.index')->with('success', 'Hotel updated successfully');
    }

    // Delete 
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('hotels.index')->with('success', 'Hotel deleted successfully');
    }
    
}
