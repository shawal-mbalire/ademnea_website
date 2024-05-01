<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HiveTemperature;
use Carbon\Carbon;
use App\Models\Hive;
use App\Models\HiveHumidity;
use App\Models\HiveWeight;
use App\Models\HiveCarbondioxide;

class HiveParameterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HiveTemperature::all();
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return HiveTemperature::find($id);
    }

    public function getTemperatureForDateRange(Request $request, $hive_id, $from_date, $to_date)
    {
        $hive = $this->checkHiveOwnership($request, $hive_id);
    
        if ($hive instanceof Response) {
            return $hive;
        }
    
        // Ensure the dates are in a valid format
        $from_date = Carbon::parse($from_date);
        $to_date = Carbon::parse($to_date);
    
        $temperatureData = HiveTemperature::where('hive_id', $hive_id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->select('record', 'created_at')
            ->get();
    
        $dates = [];
        $interiorTemperatures = [];
        $exteriorTemperatures = [];
        
        foreach ($temperatureData as $record) {
            // Assuming the temperature data is stored as 'exterior,brood,honey'
            list($interiorTemp, $broodTemp, $exteriorTemp) = explode('*', $record->record);
            
            // Turn the "2" values into null
            $interiorTemp = $interiorTemp == 2 ? null : $interiorTemp;
            $exteriorTemp = $exteriorTemp == 2 ? null : $exteriorTemp;
            
            $dates[] = $record->created_at; 
            $interiorTemperatures[] = $interiorTemp;
            $exteriorTemperatures[] = $exteriorTemp;
        }
        
        // Return the data as a JSON response
        return response()->json([
            'dates' => $dates, 
            'interiorTemperatures' => $interiorTemperatures,
            'exteriorTemperatures' => $exteriorTemperatures,
        ]);
    }

    public function getHumidityForDateRange(Request $request, $hive_id, $from_date, $to_date)
    {
        $hive = $this->checkHiveOwnership($request, $hive_id);
    
        if ($hive instanceof Response) {
            return $hive;
        }

        // Ensure the dates are in a valid format
        $from_date = Carbon::parse($from_date);
        $to_date = Carbon::parse($to_date);

        $humidityData = HiveHumidity::where('hive_id', $hive_id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->select('record', 'created_at')
            ->get();

        $dates = [];
        $interiorHumidities = [];
        $exteriorHumidities = [];
        
        foreach ($humidityData as $record) {
            // Assuming the humidity data is stored as 'exterior,brood,honey'
            list($interiorHumidity, $broodHumidity, $exteriorHumidity) = explode('*', $record->record);
            
            // Turn the "2" values into null
            $interiorHumidity = $interiorHumidity == 2 ? null : $interiorHumidity;
            $exteriorHumidity = $exteriorHumidity == 2 ? null : $exteriorHumidity;
            
            $dates[] = $record->created_at; 
            $interiorHumidities[] = $interiorHumidity;
            $exteriorHumidities[] = $exteriorHumidity;
        }
        
        // Return the data as a JSON response
        return response()->json([
            'dates' => $dates, 
            'interiorHumidities' => $interiorHumidities,
            'exteriorHumidities' => $exteriorHumidities,
        ]);
    }

    public function getWeightForDateRange(Request $request, $hive_id, $from_date, $to_date)
    {
        $hive = $this->checkHiveOwnership($request, $hive_id);
    
        if ($hive instanceof Response) {
            return $hive;
        }

        // Ensure the dates are in a valid format
        $from_date = Carbon::parse($from_date);
        $to_date = Carbon::parse($to_date);

        $weightData = HiveWeight::where('hive_id', $hive_id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->select('record', 'created_at')
            ->get();

        $dates = [];
        $weights = [];

        foreach ($weightData as $record) {
            // Since weight is a single record, no need to split it
            $weight = $record->record;

            // Turn the "2" values into null
            $weight = $weight == 2 ? null : $weight;

            $dates[] = $record->created_at;
            $weights[] = $weight;
        }

        // Return the data as a JSON response
        return response()->json([
            'dates' => $dates,
            'weights' => $weights,
        ]);
    }

    public function getCarbondioxideForDateRange(Request $request, $hive_id, $from_date, $to_date){

        $hive = $this->checkHiveOwnership($request, $hive_id);
    
        if ($hive instanceof Response) {
            return $hive;
        }

        // Ensure the dates are in a valid format
        $from_date = Carbon::parse($from_date);
        $to_date = Carbon::parse($to_date);

        $carbondioxideData = HiveCarbondioxide::where('hive_id', $hive_id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->select('record', 'created_at')
            ->get();

        $dates = [];
        $carbondioxideValues = [];

        foreach ($carbondioxideData as $record) {
            // Since carbondioxide is a single record, no need to split it
            $carbondioxide = $record->record;

            // Turn the "2" values into null
            $carbondioxide = $carbondioxide == 2 ? null : $carbondioxide;

            $dates[] = $record->created_at;
            $carbondioxideValues[] = $carbondioxide;
        }

        // Return the data as a JSON response
        return response()->json([
            'dates' => $dates,
            'carbondioxideValues' => $carbondioxideValues,
        ]);
    }


    private function checkHiveOwnership(Request $request, $hive_id)
    {
        $hive = Hive::find($hive_id);

        if (!$hive) {
            return response()->json(['error' => 'Hive not found'], 404);
        }

        $user = $request->user();
        $farmer = $user->farmer;

        if ($farmer->id !== $hive->farm->ownerId) {
            return response()->json(['error' => 'Access denied'], 403);
        }

        return $hive;
    }
 
}
