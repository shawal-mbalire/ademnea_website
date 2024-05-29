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
    
        $data = [];
    
        foreach ($temperatureData as $record) {
            // Assuming the temperature data is stored as 'exterior,brood,honey'
            list($interiorTemp, $broodTemp, $exteriorTemp) = explode('*', $record->record);
    
            // Turn the "2" values into null
            $interiorTemp = $interiorTemp == 2 ? null : $interiorTemp;
            $exteriorTemp = $exteriorTemp == 2 ? null : $exteriorTemp;
    
            $data[] = [
                'date' => $record->created_at,
                'interiorTemperature' => $interiorTemp,
                'exteriorTemperature' => $exteriorTemp,
            ];
        }
    
        // Return the data as a JSON response
        return response()->json($data);
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

        $data = [];

        foreach ($humidityData as $record) {
            // Assuming the humidity data is stored as 'exterior,brood,honey'
            list($interiorHumidity, $broodHumidity, $exteriorHumidity) = explode('*', $record->record);

            // Turn the "2" values into null
            $interiorHumidity = $interiorHumidity == 2 ? null : $interiorHumidity;
            $exteriorHumidity = $exteriorHumidity == 2 ? null : $exteriorHumidity;

            $data[] = [
                'date' => $record->created_at,
                'interiorHumidity' => $interiorHumidity,
                'exteriorHumidity' => $exteriorHumidity,
            ];
        }

        // Return the data as a JSON response
        return response()->json($data);
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

        $data = [];

        foreach ($weightData as $record) {
            // Since weight is a single record, no need to split it
            $weight = $record->record;

            // Turn the "2" values into null
            $weight = $weight == 2 ? null : $weight;

            $data[] = [
                'date' => $record->created_at,
                'weight' => $weight,
            ];
        }

        // Return the data as a JSON response
        return response()->json($data);
    }

    public function getCarbondioxideForDateRange(Request $request, $hive_id, $from_date, $to_date)
    {
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

        $data = [];

        foreach ($carbondioxideData as $record) {
            // Since carbondioxide is a single record, no need to split it
            $carbondioxide = $record->record;

            // Turn the "2" values into null
            $carbondioxide = $carbondioxide == 2 ? null : $carbondioxide;

            $data[] = [
                'date' => $record->created_at,
                'carbondioxide' => $carbondioxide,
            ];
        }

        // Return the data as a JSON response
        return response()->json($data);
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
