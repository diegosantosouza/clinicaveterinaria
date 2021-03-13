<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FastEvent;

class FullcalendarController extends Controller
{
    public function index(Request $request)
    {
        $fastEvents = FastEvent::all();

        return view('admin.fullcalendar.index', ['fastEvents' => $fastEvents]);
    }
}
