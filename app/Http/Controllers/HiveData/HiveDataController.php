<?php

namespace App\Http\Controllers\HiveData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HiveDataController extends Controller
{   
    /* --------------------------------------------------------------TEMPERATURE--------------------------------------------------------------------*/


    //default view for the graphs page and temperature graphs page
    public function temperatureDefault($id)
    {

        // Get the hive data and also the related farm data.
        $hive = DB::table('hives')->where('id', $id)->first();
        $farm = DB::table('farms')->where('id', $hive->farm_id)->first();

        // Pass the hive id and the farm name to the view.
        return view('admin.hivegraphs.temperature', ['hive_id' => $id, 'farm_name' => $farm->name]);
    }
    
    public function getTemperatureData(Request $request, $hive)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        // Ensure the dates are in a valid format
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);
        $tableName = $request->query('table');

        // Fetch the data from the database
        $temperatureData = DB::table($tableName)
            ->where('hive_id', $hive)
            ->whereBetween('created_at', [$start, $end])
            ->get();

        // Process the data into the format expected by the chart
        $dates = [];
        $exterior = [];
        $broodSection = [];
        $honeySection = [];
        
        foreach ($temperatureData as $record) {
            // Assuming the temperature data is stored as 'exterior,brood,honey'
            list($exteriorTemp, $broodTemp, $honeyTemp) = explode('*', $record->record);
            
            // Turn the "2" values into null
            $exteriorTemp = $exteriorTemp == 2 ? null : $exteriorTemp;
            $broodTemp = $broodTemp == 2 ? null : $broodTemp;
            $honeyTemp = $honeyTemp == 2 ? null : $honeyTemp;
            
            $dates[] = $record->created_at; // add this line to collect the dates
            $exterior[] = $exteriorTemp;
            $broodSection[] = $broodTemp;
            $honeySection[] = $honeyTemp;
        }
        
        // Return the data as a JSON response
        return response()->json([
            'dates' => $dates, 
            'exterior' => $exterior,
            'broodSection' => $broodSection,
            'honeySection' => $honeySection,
        ]);
    }

    /* ----------------------------------------------------------------HUMIDITY-----------------------------------------------------------*/

     //default view for the  humidity graphs page
     public function humidityDefault($id)
     {
        // Get the hive data and also the related farm data.
        $hive = DB::table('hives')->where('id', $id)->first();
        $farm = DB::table('farms')->where('id', $hive->farm_id)->first();

        // Pass the hive id and the farm name to the view.
        return view('admin.hivegraphs.humidity', ['hive_id' => $id, 'farm_name' => $farm->name]);
     }

    public function getHumidityData(Request $request, $hive)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        // Ensure the dates are in a valid format
        $start = Carbon::parse($start);
        $end = Carbon::parse($end);
        $tableName = $request->query('table');

        // Fetch the data from the database
        $humidityData = DB::table($tableName)
            ->where('hive_id', $hive)
            ->whereBetween('created_at', [$start, $end])
            ->get();

        // Process the data into the format expected by the chart
        $dates = [];
        $exterior = [];
        $broodSection = [];
        $honeySection = [];
        
        foreach ($humidityData as $record) {
            // Assuming the temperature data is stored as 'exterior,brood,honey'
            list($exteriorHumid, $broodHumid, $honeyHumid) = explode('*', $record->record);
            
            // Turn the "2" values into null
            $exteriorHumid =  $exteriorHumid == 2 ? null :  $exteriorHumid;
            $broodHumid = $broodHumid == 2 ? null : $broodHumid;
            $honeyHumid = $honeyHumid == 2 ? null : $honeyHumid;
            
            $dates[] = $record->created_at; // add this line to collect the dates
            $exterior[] =  $exteriorHumid;
            $broodSection[] = $broodHumid;
            $honeySection[] = $honeyHumid;
        }
        
        // Return the data as a JSON response
        return response()->json([
            'dates' => $dates,
            'exterior' => $exterior,
            'broodSection' => $broodSection,
            'honeySection' => $honeySection,
        ]);
    }

   
}
