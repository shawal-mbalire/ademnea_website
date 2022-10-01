<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\HivePhoto;
use Illuminate\Http\Request;

class HivePhotoController extends Controller
{
     /**
     * Display a listing of the hive videos
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {        
        $perPage = 30;
       
        $photos = HivePhoto::latest()->paginate($perPage);

        return view('admin.hivedata.photos', compact('photos'));
    }

   
}
