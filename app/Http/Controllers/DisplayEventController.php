<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DisplayEventController extends Controller
{
    public function displayEvent(){

// this code sends events to the galleries page to be disaplayed.

$events = DB::table('events')
->leftJoin('event_photos', 'events.id', '=', 'event_photos.event_id')
->select('events.*', 'event_photos.photo_url')
->get()
->groupBy('id');



   return view('gallery',compact('events'));

    }
}
