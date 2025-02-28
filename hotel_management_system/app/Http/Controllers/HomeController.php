<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $products;

    public function __construct(){
        $this->hotel = new Hotel();
    }

    public function index()
    {
        $response ['hotels']= $this->hotel->all();
        return view('home')->with($response);
    }
}
