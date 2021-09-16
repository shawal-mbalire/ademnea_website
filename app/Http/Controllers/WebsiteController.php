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
        $profile = ResearchProfile::get()->where('category', 'masters')->where('country', 'sudan');

        return view('website.mastersprofile',
        [
            'profile'=>$profile           
        ]
    );
    }
    public function uganda(){
        $profile = ResearchProfile::get()->where('category', 'masters')->where('country', 'uganda');

        return view('website.mastersprofile',
        [
            'profile'=>$profile           
        ]
    );
    }
    public function tanzania(){
        $profile = ResearchProfile::get()->where('category', 'masters')->where('country', 'tanzania');

        return view('website.workpackages',
        [
            'workpackages'=>$workpackages,
            'profile'=>$profile           
        ]
    );
    }

    public function wp1(){
        $workpackages = WorkPackage::get()->where('name', 'wp1');

        return view('website.workpackages',
        [
            'workpackages'=>$workpackages          
        ]
    );
    }

    public function wp2(){
        $workpackages = WorkPackage::get()->where('name', 'wp2');

        return view('website.workpackages',
        [
            'workpackages'=>$workpackages          
        ]
    );
    }

    public function wp3(){
        $workpackages = WorkPackage::get()->where('name', 'wp3');

        return view('website.workpackages',
        [
            'workpackages'=>$workpackages          
        ]
    );
    }

    public function wp4(){
        $workpackages = WorkPackage::get()->where('name', 'wp4');

        return view('website.workpackages',
        [
            'workpackages'=>$workpackages          
        ]
    );
    }
   }
