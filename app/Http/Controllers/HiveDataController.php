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

    $hiveTemperature = HiveTemperature::pluck('record', 'created_at');
    // $hiveTemp = HiveTemperature::findorfail($id);

    // $hiveTemperature = $hiveTemp::pluck('record', 'created_at');




    // return $hiveTemperature->keys();
    // return $hiveTemperature->values();

    $Tchart = new HiveDataChart;

    $Tchart->labels($hiveTemperature->keys());

    //$Tchart->dataset('Temperature', 'line', $hiveTemperature->values());

    $Tchart->dataset('Temperature', 'line', $hiveTemperature->values())->Color('green')->options(['backgroundColor' => 'transparent']);

    $hiveHumidity = HiveHumidity::pluck('record', 'created_at');
    // $hiveHum = HiveTemperature::findorfail($id);

    // $hiveHumidity = $hiveHum::pluck('record', 'created_at');


    $Hchart = new HiveDataChart;

    $Hchart->labels($hiveHumidity->keys());

    //$Hchart->dataset('Humidity', 'line', $hiveHumidity->values());

    $Hchart->dataset('Humidity', 'line', $hiveHumidity->values())->Color('blue')->options(['backgroundColor' => 'transparent']);

    //->backgroundColor('red')

    $hiveCarbondioxide = HiveCarbondioxide::pluck('record', 'created_at');
    // $hiveCar = HiveTemperature::findorfail($id);

    // $hiveCarbondioxide = $hiveCar::pluck('record', 'created_at');


    $Cchart = new HiveDataChart;

    $Cchart->labels($hiveCarbondioxide->keys());

    $Cchart->dataset('Carbondioxide', 'line', $hiveCarbondioxide->values())->Color('red')->options(['backgroundColor' => 'transparent']);


    //$Cchart->dataset('Carbondioxide', 'scatter', $hiveCarbondioxide->values())->backgroundColor('red')->options([
    //    'showLine' => true,
    //]);

    return view('website.hive_data', compact('Tchart', 'Hchart', 'Cchart'));
    }

//      public function show($id)
//      {

//     $hiveTemperature = HiveTemperature::findOrFail($id);

//     return view('website.hive_data', ['hiveTemperature'=> $hiveTemperature]);
//  }


}
