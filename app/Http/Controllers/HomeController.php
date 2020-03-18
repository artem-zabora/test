<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Reservation;
use App\Session;
use App\Traits\CalendarTrait;

class HomeController extends Controller
{
    use CalendarTrait;

    public function index()
    {
        $data = $this->weeks();

        return view('index', ['data' => $data]);
    }

    public function day($date)
    {
        $date = explode('-', $date);
        $day = array_pop($date);
        $month = array_pop($date);
        $date = $day . '-' . $month;

        $reservations = Reservation::where('date', $date)->get();
        $sessions = Session::all();


        $data = [
            'date' => $date,
            'reservations' => $reservations,
            'sessions' => $sessions
        ];

        return view('date', ['data' => $data]);
    }

    public function store(Request $request)
    {
        dd($request->input());
    }


}
