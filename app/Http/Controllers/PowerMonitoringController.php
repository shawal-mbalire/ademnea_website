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
        $hive_battery = DB::table('hiitoring.index', compact('hive_battery'));

    }
    // Controller
public function index()
{
    $batteryData = Battery::all();

    return view('battery', [
        'batteryData' => $batteryData,
    ]);
}
    
}
