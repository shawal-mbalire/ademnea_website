<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\HiveCarbondioxide;
use Illuminate\Http\Request;

class HiveCarbondioxideController extends Controller
{
     /**
     * Display a listing of the hive videos
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {        
        //$perPage = 30;
        //$carbondioxide = HiveCarbondioxide::latest()->paginate($perPage);

        $hiveId = $request->query('hive_id');

        // return $hiveId;
       
        $carbondioxide = HiveCarbondioxide::where('hive_id', $hiveId)->get();

        return view('admin.hivedata.carbondioxide', compact('carbondioxide'));
    }

   
}
