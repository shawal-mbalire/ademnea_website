<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\ResearchProfile;
use App\Models\Gallery;
use App\Models\WorkPackage;


class WebsiteController extends Controller
{
    public function index(){
        $gallery = Gallery::get();
        $teams = Team::get();
        return view('website.layouts', [
            'teams'=>$teams,
            'gallery' => $gallery
        ]
    ); 

    }
    public function sudan(){
        $profile = ResearchProfile::where('category', 'masters')->where('country', 'sudan')->get();

        return view('website.mastersprofile',
        [
            'profile'=>$profile           
        ]
    );
    }
    public function uganda(){
        $profile = ResearchProfile::where('category', 'masters')->where('country', 'uganda')->get();

        return view('website.mastersprofile', compact("profile"));
    }
    public function tanzania(){
        $profile = ResearchProfile::get()->where('category', 'masters')->where('country', 'tanzania')->get();

        return view('website.mastersprofile',
        [
            'profile'=>$profile           
        ]
    );
    }

    public function wp1(){
        $workpackages = WorkPackage::where('name', 'wp1')->get();

        return view('website.workpackages',
        [
            'workpackages'=>$workpackages          
        ]
    );
    }

    public function wp2(){
        $workpackages = WorkPackage::where('name', 'wp2')->get();

        return view('website.workpackages',
        [
            'workpackages'=>$workpackages          
        ]
    );
    }

    public function wp3(){
        $workpackages = WorkPackage::where('name', 'wp3')->get();

        return view('website.workpackages',
        [
            'workpackages'=>$workpackages          
        ]
    );
    }

    public function wp4(){
        $workpackages = WorkPackage::where('name', 'wp4')->get();

        return view('website.workpackages',
        [
            'workpackages'=>$workpackages          
        ]
    );
    }
   }
