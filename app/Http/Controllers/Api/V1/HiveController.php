<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Farm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HiveController extends Controller
{
    /**
     * Display a listing of the hives of a specific farm.
     *
     * @param  int  $farm_id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $farm_id)
    {
        $farm = Farm::find($farm_id);

        if (!$farm) {
            return response()->json(['error' => 'Farm not found'], 404);
        }

        // Get the currently authenticated user
        $user = $request->user();

        // Get the farmer associated with the user
        $farmer = $user->farmer;

        // Check if the farmer is the owner of the farm
        if ($farmer->id !== $farm->ownerId) {
            return response()->json(['error' => 'Access denied'], 403);
        }

        $hives = $farm->hives;

        return response()->json($hives);
    }

    
    /**
     * Get the most recent weight of a hive.
     *
     * @param  Request  $request
     * @param  int  $hive_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLatestWeight(Request $request, $hive_id){
        $hive = $this->checkHiveOwnership($request, $hive_id);

        if ($hive instanceof Response) {
            return $hive;
        }

        $latestWeight = HiveWeight::where('hive_id', $hive_id)
            ->orderBy('created_at', 'desc')
            ->first();

        return response()->json($latestWeight);
    }

    /**
     * Display the specified hive.
     *
     * @param  int  $farm_id
     * @param  int  $hive_id
     * @return \Illuminate\Http\Response
     */
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