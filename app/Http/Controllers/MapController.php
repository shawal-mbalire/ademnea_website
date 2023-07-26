<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;


class MapController extends Controller
{
    // Controller responsible for displaying newsletters
    public function displayMap()
    {
        return view('admin.map.index');
    }
    
}
