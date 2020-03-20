<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 18.03.2020
 * Time: 9:42
 */

namespace App\Traits;

use App\Reservation;
use App\Session;

trait SessionTrait
{

    public function sessionsCalculate($request)
    {
        $result = [];
        $sessions = Session::all();
        $reservations = Reservation::where('date', $request->input('date'))->get();

        if ($reservations->count() > 0){
            foreach($reservations as $reservation){
                foreach($sessions as $session){
                    if ($reservation->session_id == $session->id){
                        $result[] = ['id' => $session->id, 'session' => $session->session, 'places' => 15 - $reservation->count];
                    }else{
                        $result[] = ['id' => $session->id, 'session' => $session->session, 'places' => 15];
                    }
                }
            }
        }else{
            foreach($sessions as $session){
                $result[] = ['id' => $session->id, 'session' => $session->session, 'places' => 15];
            }
        }
        return $result;
    }

    public function reservationStore($request)
    {
       $reservation = Reservation::create([
            'date' => $request->input('date'),
            'session_id' => $request->input('id'),
            'type' => $request->input('type'),
            'count' => $request->input('count'),
        ]);

       return $reservation;
    }



}