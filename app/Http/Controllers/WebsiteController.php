<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\WorkPackage;
use App\Models\Gallery;

class WebsiteController extends Controller
{
    public function index(){
        $gallery = Gallery::get();
        $teams = Team::get();
        $workpackages = WorkPackage::get();
        
        return view('website.layouts', [
            'teams'=>$teams,
            'workpackages'=>$workpackages,
            'gallery' => $gallery
        ],        
    );

    }


}
