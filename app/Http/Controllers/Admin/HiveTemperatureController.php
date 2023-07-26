<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\HiveTemperature;
use Illuminate\Http\Request;

class HiveTemperatureController extends Controller
{
     /**
     * Display a listing of the hive videos
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {      
        
        $hiveId = $request->query('hive_id');

        // return $hiveId;
       
        $temperatures = HiveTemperature::where('hive_id', $hiveId)->get();

        return view('admin.hivedata.temperatures', compact('temperatures'));
    }

   
}
