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
       // $perPage = 30;
       
       // $photos = HivePhoto::latest()->paginate($perPage);

       $hiveId = $request->query('hive_id');
       // return $hiveId;
      // $photos = HivePhoto::where('hive_id', $hiveId)->get();

       $photos = HivePhoto::where('hive_id', $hiveId)
        ->latest() // This orders the records by the created_at column in descending order (latest first).
        ->paginate(8) ;// This limits the result to the latest 100 entries.
        // ->get();


        return view('admin.hivedata.photos', compact('photos'));
    }

   
}
