<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;

class EventRestController extends Controller
{

    public function index() {

        // load events w/ user associated
        $events = Event :: with('user')->get();

        return response()->json($events);
    }
}
