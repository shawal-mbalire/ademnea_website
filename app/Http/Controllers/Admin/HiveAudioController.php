<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\HiveAudio;
use Illuminate\Http\Request;

class HiveAudioController extends Controller
{
     /**
     * Display a listing of the hive audios
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {        
        $perPage = 30;
       
        $audios = HiveAudio::latest()->paginate($perPage);

        return view('admin.hivedata.audios', compact('audios'));
    }

   
}
