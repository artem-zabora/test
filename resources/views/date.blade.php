@extends('layouts.layout')

@section('content')
    <h1>{{$data['date']}}</h1>



    @foreach($data['sessions'] as $session)
        @if(count($data['reservations']) > 0 )
            @foreach($data['reservations'] as $reservation)
                @if($reservation->session == $session->session)
                     <p>{{ $reservation->session }} bron</p>
                @else
                    <br>
                    <form action="{{route('store')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="session" value="{{ $session->session }}">
                        <input type="submit" value="{{ $session->session }}">
                    </form>
                @endif
            @endforeach
        @else
            <br>
            <form action="{{route('store')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="session" value="{{ $session->session }}">
                <input type="submit" value="{{ $session->session }}">
            </form>
        @endif
    @endforeach

@endsection


