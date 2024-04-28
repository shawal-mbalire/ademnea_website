<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FarmController extends Controller
{
    /**
     * Display a listing of the farms of the authenticated farmer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $farmer = Farmer::where('user_id', $user->id)->first();

        if (!$farmer) {
            return response()->json(['error' => 'Farmer not found'], 404);
        }

        $farms = $farmer->farms;

        return response()->json($farms);
    }
}