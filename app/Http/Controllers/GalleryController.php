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

    //routes to fetch the gallery photos for all the categories will appear here.
    public function teams(){

        return view('admin.gallery.teams_gallery');
    }

    public function photos(){
        
        
        return view('admin.gallery.photos_gallery');
    }

    public function galleries(){
        
        
        return view('admin.gallery.galleries_gallery');
    }

    public function albums(){
        
        
        return view('admin.gallery.albums_gallery');
    }
}
