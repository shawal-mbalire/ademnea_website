<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Response;


class PowerMonitoringController extends Controller
{
    // Controller responsible for displaying newsletters
    public function powerMonitor($id)
    {
        $hive_battery = DB::table('hive_battery')->where('hive_id', $id)->get();
        return view('admin.power-monitoring.index', compact('hive_battery'));

    }
    
}
