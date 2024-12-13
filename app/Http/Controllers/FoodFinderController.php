<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodFinderController extends Controller
{
    public function index(){
        return view('foodfinders.index');
    }
}
