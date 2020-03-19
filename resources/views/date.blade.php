@extends('layouts.layout')

@section('content')
<div class="container">
        <h1 class="text-justify">Дата: {{$data['date']}}</h1>
    <div class="reservation">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label >Тип посетителей</label>
                    <select class="custom-select mr-sm-2" name="type">
                        <option value="1">Семья</option>
                        <option value="2">Компания</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label >Кол-во посетителей</label>
                <input class="form-control" type="number" name="count"  min="1" max="5" required />
            </div>
        </div>
        <form action="" method="post">
            {{ csrf_field() }}
            <table class="table">
                <tbody>
                    <tr>
                        @foreach($data['sessions'] as $session)
                            @if(count($data['reservations']) > 0 )
                                @foreach($data['reservations'] as $reservation)
                                    @if($reservation->session == $session->session)
                                        <td>
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <label class="reserved"> {{ $session->session }}</label>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox"    value="{{ $session->session }}">
                                                <label class="free"> {{ $session->session }}</label>
                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                            @else
                                <td>
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input type="checkbox"    value="{{ $session->session }}">
                                        <label class="free"> {{ $session->session }}</label>
                                    </div>
                                </td>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
@endsection


