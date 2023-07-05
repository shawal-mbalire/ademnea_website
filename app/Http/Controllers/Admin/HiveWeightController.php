<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\HiveWeight;
use Illuminate\Http\Request;

class HiveWeightController extends Controller
{
     /**
     * Display a listing of the hive videos
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {        
        //$perPage = 30;
       
        //$weights = HiveWeight::latest()->paginate($perPage);

        $hiveId = $request->query('hive_id');
        // return $hiveId;
        $weights = HiveWeight::where('hive_id', $hiveId)->get();

        return view('admin.hivedata.weights', compact('weights'));
    }

   
}
