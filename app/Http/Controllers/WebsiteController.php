<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\WorkPackage;
use App\Models\ResearchProfile;
use App\Models\Gallery;
use App\Models\Task;


class WebsiteController extends Controller
{
    public function index(){
        $gallery = Gallery::get();
        $teams = Team::get();
        $workpackages = WorkPackage::get();
        $tasks = Task::get();        
        return view('website.layouts', [
            'teams'=>$teams,
            'workpackages'=>$workpackages,
            'gallery' => $gallery,
            'tasks' => $tasks
        ]
    ); 

    }
    public function sudan(){
        $workpackages = WorkPackage::get();
        $profile = ResearchProfile::get()->where('category', 'masters')->where('country', 'sudan');

        return view('website.mastersprofile',
        [
            'workpackages'=>$workpackages,
            'profile'=>$profile           
        ]
    );
    }
    public function uganda(){
        $workpackages = WorkPackage::get();
        $profile = ResearchProfile::get()->where('category', 'masters')->where('country', 'uganda');

        return view('website.mastersprofile',
        [
            'workpackages'=>$workpackages,
            'profile'=>$profile           
        ]
    );
    }
    public function tanzania(){
        $workpackages = WorkPackage::get();
        $profile = ResearchProfile::get()->where('category', 'masters')->where('country', 'tanzania');

        return view('website.mastersprofile',
        [
            'workpackages'=>$workpackages,
            'profile'=>$profile           
        ]
    );
    }
   

}
