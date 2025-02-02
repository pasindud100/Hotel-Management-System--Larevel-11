<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    protected $hotel;

    public function __construct(){
        $this->hotel = new Hotel();
    }

    public function index(){
        $response['hotels'] = $this->hotel->all();
        return view('hotels.index')->with($response);
    }

    public function store(Request $request){
        //validtate the request
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',//adjust file size and allow extentions
        ]);
        //check whether image is uploaded correctly
        if($request->hasFile('image')){
            //store the image in public/image directory
            $fileName = $request->file('image')->store('images', 'public');
            //add 4to file iage to the validated data
            $validateData['image'] = $fileName;
        }
        //create the product
        Hotel::create($validateData);
        //redirect back with success message
        return redirect()->back()->with('success','Hotel created successfully');
}
}