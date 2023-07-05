<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\HiveHumidity;
use Illuminate\Http\Request;

class HiveHumidityController extends Controller
{
     /**
     * Display a listing of the hive videos
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {        
        $perPage = 30;
       
        $humidity = HiveHumidity::latest()->paginate($perPage);

        return view('admin.hivedata.humidity', compact('humidity'));
    }

   
}
