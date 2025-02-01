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
}
