<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    protected $hotel;

    public function __construct()
    {
        $this->hotel = new Hotel();
    }

    // get all hotels to display in the table
    public function index()
    {
        $response['hotels'] = $this->hotel->all();
        return view('hotels.index')->with($response);
    }

    // this for tore a new hotel
    public function store(Request $request)
    {
        // 
        // validate the request
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
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
        Hotel::create($validateData);
        // sending back with success message
        return redirect()->route('hotels.index')->with('success', 'Hotel created successfully');
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

   
}