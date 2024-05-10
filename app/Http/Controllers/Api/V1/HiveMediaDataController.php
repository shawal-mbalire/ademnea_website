<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Hive;
use App\Models\HiveAudio;
use App\Models\HivePhoto;
use App\Models\HiveVideo;

class HiveMediaDataController extends Controller
{
    /**
     * Get images for a specific date range.
     *
     * @param  Request  $request
     * @param  int  $hive_id
     * @param  string  $from_date
     * @param  string  $to_date
     * @return \Illuminate\Http\JsonResponse
     */
    public function getImagesForDateRange(Request $request, $hive_id, $from_date, $to_date)
    {
        $hive = $this->checkHiveOwnership($request, $hive_id);

        if ($hive instanceof Response) {
            return $hive;
        }

        $from_date = Carbon::parse($from_date);
        $to_date = Carbon::parse($to_date);

        $imageData = HivePhoto::where('hive_id', $hive_id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->select('path', 'created_at')
            ->paginate(10);

        foreach ($imageData as $record) {
            $record->path = 'public/hiveimage/' . $record->path;
        }

        return $this->formatResponse($imageData);
    }

    /**
     * Get videos for a specific date range.
     *
     * @param  Request  $request
     * @param  int  $hive_id
     * @param  string  $from_date
     * @param  string  $to_date
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVideosForDateRange(Request $request, $hive_id, $from_date, $to_date)
    {
        $hive = $this->checkHiveOwnership($request, $hive_id);

        if ($hive instanceof Response) {
            return $hive;
        }

        $from_date = Carbon::parse($from_date);
        $to_date = Carbon::parse($to_date);

        $videoData = HiveVideo::where('hive_id', $hive_id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->select('path', 'created_at')
            ->paginate(10);

        foreach ($videoData as $record) {
            $record->path = 'public/hivevideo/' . $record->path;
        }

        return $this->formatResponse($videoData);
    }

    /**
     * Get audios for a specific date range.
     *
     * @param  Request  $request
     * @param  int  $hive_id
     * @param  string  $from_date
     * @param  string  $to_date
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAudiosForDateRange(Request $request, $hive_id, $from_date, $to_date)
    {
        $hive = $this->checkHiveOwnership($request, $hive_id);

        if ($hive instanceof Response) {
            return $hive;
        }

        $from_date = Carbon::parse($from_date);
        $to_date = Carbon::parse($to_date);

        $audioData = HiveAudio::where('hive_id', $hive_id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->select('path', 'created_at')
            ->paginate(10);

        foreach ($audioData as $record) {
            $record->path = 'public/hiveaudio/' . $record->path;
        }

        return $this->formatResponse($audioData);
    }

    /**
     * Check if the authenticated user owns the specified hive.
     *
     * @param  Request  $request
     * @param  int  $hive_id
     * @return \Illuminate\Http\JsonResponse|Hive
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

    /**
     * Format the response to include pagination data.
     *
     * @param  \Illuminate\Pagination\LengthAwarePaginator  $data
     * @return \Illuminate\Http\JsonResponse
     */
    private function formatResponse($data)
    {
        return response()->json([
            'dates' => $data->pluck('created_at'),
            'paths' => $data->pluck('path'),
            'pagination' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
                'next_page_url' => $data->nextPageUrl(),
                'prev_page_url' => $data->previousPageUrl(),
            ],
        ]);
    }
}