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
        //$perPage = 30;
       
        //$videos = HiveVideo::latest()->paginate($perPage);

        $hiveId = $request->query('hive_id');
        // return $hiveId;
       // $videos = HiveVideo::where('hive_id', $hiveId)->get();

        $videos = HiveVideo::where('hive_id', $hiveId)
        ->latest() // This orders the records by the created_at column in descending order (latest first).
        ->paginate(8); // This limits the result to the latest 100 entries.
        // ->get();


        return view('admin.hivedata.videos', compact('videos'));
    }

   
}
