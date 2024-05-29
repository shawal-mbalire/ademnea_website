<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Farmer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FarmController extends Controller
{
    /**
     * Get the authenticated farmer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Models\Farmer
     */
    private function getAuthenticatedFarmer(Request $request)
    {
        $user = $request->user();
        $farmer = Farmer::where('user_id', $user->id)->first();

        if (!$farmer) {
            return response()->json(['error' => 'Farmer not found'], 404);
        }

        return $farmer;
    }

    /**
     * Display a listing of the farms of the authenticated farmer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $farmer = $this->getAuthenticatedFarmer($request);

        if ($farmer instanceof \Illuminate\Http\JsonResponse) {
            return $farmer;
        }

        $farms = $farmer->farms;

        return response()->json($farms);
    }

    /**
     * Calculate the months until the start of the harvest season.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function timeUntilHarvestSeason(Request $request)
    {
        $farmer = $this->getAuthenticatedFarmer($request);

        if ($farmer instanceof \Illuminate\Http\JsonResponse) {
            return $farmer;
        }

        // Define the start and end dates of the harvest seasons
        $harvestSeasons = [
            ['start' => '01-01', 'end' => '02-28'], // January to February
            ['start' => '06-01', 'end' => '08-31'], // June to August
            ['start' => '12-01', 'end' => '12-31']  // December
        ];

        // Get the current date
        $currentDate = new \DateTime();
        $currentYear = (int) $currentDate->format('Y');

        // Initialize the time until the start of the next harvest season
        $timeUntilHarvest = null;

        foreach ($harvestSeasons as $season) {
            $startOfSeason = \DateTime::createFromFormat('Y-m-d', $currentYear . '-' . $season['start']);
            $endOfSeason = \DateTime::createFromFormat('Y-m-d', $currentYear . '-' . $season['end']);

            // Check if the current date is within the harvest season
            if ($currentDate >= $startOfSeason && $currentDate <= $endOfSeason) {
                return response()->json(['time_until_harvest' => [
                    'months' => 0,
                    'days' => 0,
                ]]);
            }

            // Adjust the start of the season to the next year if it has already passed this year
            if ($startOfSeason < $currentDate) {
                $startOfSeason->modify('+1 year');
            }

            // Calculate the interval until the start of the next harvest season
            $interval = $currentDate->diff($startOfSeason);

            // If this is the first interval calculated or if it's shorter than the previously calculated interval, update the timeUntilHarvest
            if ($timeUntilHarvest === null || $interval->days < $timeUntilHarvest->days) {
                $timeUntilHarvest = $interval;
            }
        }

        return response()->json(['time_until_harvest' => [
            'months' => $timeUntilHarvest->m,
            'days' => $timeUntilHarvest->d,
        ]]);
    }
    
}