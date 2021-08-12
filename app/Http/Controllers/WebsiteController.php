<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class WebsiteController extends Controller
{
    public function index(){
        $teams = Team::get();
        return view('website.layouts', [
            'teams'=>$teams
        ]);
    }
}
