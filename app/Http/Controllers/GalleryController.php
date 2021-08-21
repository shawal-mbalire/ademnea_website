<?php

namespace App\Http\Controllers;
use App\Models\WorkPackage;
use App\Models\Gallery;
use App\Models\Scholarship;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $workpackages = WorkPackage::get();
        $gallery = Gallery::get();

        return view('website.gallerylayout',
        [
            'workpackages'=>$workpackages,
            'gallery' => $gallery          
        ]
    );
    }
}
