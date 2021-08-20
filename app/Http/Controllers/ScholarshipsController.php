<?php

namespace App\Http\Controllers;
use App\Models\WorkPackage;
use App\Models\Team;
use App\Models\Gallery;
use App\Models\Scholarship;

use Illuminate\Http\Request;

class ScholarshipsController extends Controller
{
    public function index(){
        $workpackages = WorkPackage::get();
        $scholarship = Scholarship::get();

        return view('website.scholarshiplayout',
        [
            'workpackages'=>$workpackages,
            'scholarships'=>$scholarship           
        ]
    );
    }
}
