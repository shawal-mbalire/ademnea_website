<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\HiveVideo;
use Illuminate\Http\Request;

class HiveVideoController extends Controller
{
     /**
     * Display a listing of the hive videos
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {        
        $perPage = 30;
       
        $videos = HiveVideo::latest()->paginate($perPage);

        return view('admin.hivedata.videos', compact('videos'));
    }

   
}
