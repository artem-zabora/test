<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Traits\CalendarTrait;
use App\Traits\SessionTrait;

class HomeController extends Controller
{
    use CalendarTrait;
    use SessionTrait;

    public function index()
    {
        $data = $this->weeks();

        return view('index', ['data' => $data]);
    }

    public function dayShow($date)
    {
        $date = explode('-', $date);
        $day = array_pop($date);
        $month = array_pop($date);
        $date = $day . '-' . $month;

        $data = [
            'date' => $date,
        ];

        return view('date', ['data' => $data]);
    }

    public function store(Request $request)
    {

        $date = $request->input('date');

        $this->reservationStore($request);

        $sessions = $this->sessionsCalculate($request);

        $data = [
          'date' => $date,
          'sessions' => $sessions,

        ];

        return view('date', ['data' => $data]);


    }

    public function showSessions(Request $request)
    {
        $sessions = $this->sessionsCalculate($request);
        $data = [
            'date' => $request->input('date'),
            'sessions' => $sessions
        ];

        return view('date', ['data' => $data]);
    }



}
