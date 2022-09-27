<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Models\Farmer;


class HiveDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {        
        $perPage = 30;
       
        $farmer = Farmer::latest()->paginate($perPage);

        return view('admin.hivedata.index', compact('farmer'));
    }
}
