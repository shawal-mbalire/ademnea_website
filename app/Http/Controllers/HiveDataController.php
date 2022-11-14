<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\HiveTemperature;
use App\Models\HiveHumidity;
use App\Models\HiveCarbondioxide;

use App\Charts\HiveDataChart;

class HiveDataController extends Controller
{
    //
    // public function show($id)
    // {
       
    //     $newsletter = Newsletter::findOrFail($id);

    //     return view('website.individual_newsletter', ['newsletter'=> $newsletter]);
    // }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */

    public function hiveData($id) {

    //$hiveTemperature = HiveTemperature::pluck('record', 'created_at');
    $hiveTemperature = HiveTemperature::pluck('record', 'created_at');

    

    // return $hiveTemperature->keys();
    // return $hiveTemperature->values();

    $Tchart = new HiveDataChart;

    $Tchart->labels($hiveTemperature->keys());

    $Tchart->dataset('Temperature', 'line', $hiveTemperature->values())->backgroundColor('grey');


    $hiveHumidity = HiveHumidity::pluck('record', 'created_at');

    $Hchart = new HiveDataChart;

    $Hchart->labels($hiveHumidity->keys());

    $Hchart->dataset('Humidity', 'bar', $hiveHumidity->values())->backgroundColor('green');


    $hiveCarbondioxide = HiveCarbondioxide::pluck('record', 'created_at');

    $Cchart = new HiveDataChart;

    $Cchart->labels($hiveCarbondioxide->keys());

    $Cchart->dataset('Carbondioxide', 'doughnut', $hiveCarbondioxide->values())->backgroundColor('red');

    return view('website.hive_data', compact('Tchart', 'Hchart', 'Cchart'));
    }

//      public function show($id)
//      {
       
//     $hiveTemperature = HiveTemperature::findOrFail($id);

//     return view('website.hive_data', ['hiveTemperature'=> $hiveTemperature]);
//  }


}
