<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\WorkPackage;

class WebsiteController extends Controller
{
    public function index(){
        $teams = Team::get();
        $workpackages = WorkPackage::get();
        return view('website.layouts', [
            'teams'=>$teams,
            'workpackages'=>$workpackages
        ]);
    }


}
