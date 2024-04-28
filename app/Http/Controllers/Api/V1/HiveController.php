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
}