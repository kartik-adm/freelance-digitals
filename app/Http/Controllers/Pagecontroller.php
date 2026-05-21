<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    public function about (){
        return view('component.aboutus');
    }

    public function ourservices (){
        return view('component.ourservices');
    }
}
