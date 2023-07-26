<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;


class PowerMonitoringController extends Controller
{
    // Controller responsible for displaying newsletters
    public function powerMonitor()
    {
        return view('admin.power-monitoring.index');
    }
    
}
