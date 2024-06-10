<?php

namespace App\Http\Controllers;
use App\Models\PowerRecord;

use Illuminate\Http\Request;

class PowerRecordController extends Controller
{
    public function getPowerRecord(){    
        return view("admin.hivedata.power");
    }
    public function postPowerRecord(Request $request){    
        $response = $request->validate(
            [
                'hives_id' => 'required',
                'batteryvoltage' => 'required',
                'batterypercentage' => 'required',
                'solarvoltagelevel' => 'nullable'
            ],
        );
        $powerRecord = PowerRecord::create($response);
        return 'success';
    }
}
