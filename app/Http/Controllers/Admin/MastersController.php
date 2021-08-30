<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WorkPackage;
use App\Models\Team;
use App\Models\Gallery;
use App\Models\Scholarship;

class MastersController extends Controller
{
    public function index(){
        $workpackages = WorkPackage::get();
        $scholarship = Scholarship::get()->where('category', 'masters');

        return view('website.masterslayout',
        [
            'workpackages'=>$workpackages,
            'scholarships'=>$scholarship           
        ]
    );
    }
}
