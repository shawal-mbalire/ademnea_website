<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\HiveAudio;
use App\Models\HivePhoto;
use App\Models\HiveVideo;

class HiveMediaDataController extends Controller
{
    public function getImagesForDateRange($hive_id, $from_date, $to_date)
    {
        // Ensure the dates are in a valid format
        $from_date = Carbon::parse($from_date);
        $to_date = Carbon::parse($to_date);

        $imageData = HivePhoto::where('hive_id', $hive_id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->select('path', 'created_at')
            ->paginate(10); // Adjust the number as needed

        $dates = [];
        $imagePaths = [];

        foreach ($imageData as $record) {
            // Append the path to the image name
            $imagePath = 'public/hiveimage/' . $record->path;

            $dates[] = $record->created_at;
            $imagePaths[] = $imagePath;
        }

        // Return the data as a JSON response
        return response()->json([
            'dates' => $dates,
            'imagePaths' => $imagePaths,
            'pagination' => [
                'total' => $imageData->total(),
                'per_page' => $imageData->perPage(),
                'current_page' => $imageData->currentPage(),
                'last_page' => $imageData->lastPage(),
                'from' => $imageData->firstItem(),
                'to' => $imageData->lastItem(),
                'next_page_url' => $imageData->nextPageUrl(),
                'prev_page_url' => $imageData->previousPageUrl(),
            ],
        ]);
    }
    
    public function getVideosForDateRange($hive_id, $from_date, $to_date){
        // Ensure the dates are in a valid format
        $from_date = Carbon::parse($from_date);
        $to_date = Carbon::parse($to_date);

        $videoData = HiveVideo::where('hive_id', $hive_id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->select('path', 'created_at')
            ->paginate(10); // Adjust the number as needed

        $dates = [];
        $videoPaths = [];

        foreach ($videoData as $record) {
            // Append the path to the video name
            $videoPath = 'public/hivevideo/' . $record->path;

            $dates[] = $record->created_at;
            $videoPaths[] = $videoPath;
        }

        // Return the data as a JSON response
        return response()->json([
            'dates' => $dates,
            'videoPaths' => $videoPaths,
            'pagination' => [
                'total' => $videoData->total(),
                'per_page' => $videoData->perPage(),
                'current_page' => $videoData->currentPage(),
                'last_page' => $videoData->lastPage(),
                'from' => $videoData->firstItem(),
                'to' => $videoData->lastItem(),
                'next_page_url' => $videoData->nextPageUrl(),
                'prev_page_url' => $videoData->previousPageUrl(),
            ],
        ]);
    }

    public function getAudiosForDateRange($hive_id, $from_date, $to_date){
        // Ensure the dates are in a valid format
        $from_date = Carbon::parse($from_date);
        $to_date = Carbon::parse($to_date);

        $audioData = HiveAudio::where('hive_id', $hive_id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->select('path', 'created_at')
            ->paginate(10); // Adjust the number as needed

        $dates = [];
        $audioPaths = [];

        foreach ($audioData as $record) {
            // Append the path to the audio name
            $audioPath = 'public/hiveaudio/' . $record->path;

            $dates[] = $record->created_at;
            $audioPaths[] = $audioPath;
        }

        // Return the data as a JSON response
        return response()->json([
            'dates' => $dates,
            'audioPaths' => $audioPaths,
            'pagination' => [
                'total' => $audioData->total(),
                'per_page' => $audioData->perPage(),
                'current_page' => $audioData->currentPage(),
                'last_page' => $audioData->lastPage(),
                'from' => $audioData->firstItem(),
                'to' => $audioData->lastItem(),
                'next_page_url' => $audioData->nextPageUrl(),
                'prev_page_url' => $audioData->previousPageUrl(),
            ],
        ]);
    }
}
