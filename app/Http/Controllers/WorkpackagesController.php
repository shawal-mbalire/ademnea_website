<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkPackage;

class WorkpackagesController extends Controller
{
    //
    public function workpackages()
    {
        $workpackages = WorkPackage::get();
        return view('website.workpackages', ['workpackages'=>$workpackages,]);
    }
}
