@extends('layouts.layout')

@section('content')
<div class="container">
        <h1 class="text-justify">Дата: {{$data['date']}}</h1>
    <div class="reservation">
        <form id="visitors" class="form-group" action="{{route('visitors')}}" method="post" >
            {{ csrf_field() }}
            <input type="hidden" name="date" id="date" value="{{$data['date']}}">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Тип посетителей</label>
                        <select class="custom-select mr-sm-2" name="type" id="type">
                            <option value="family">Семья</option>
                            <option value="company">Компания</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label >Кол-во посетителей</label>
                    <input class="form-control" type="number" name="count" id="count"  min="1" max="5" required />
                </div>
                <button type="submit" class="btn btn-primary">Просмотр</button>
            </div>
        </form>

        @if(isset($data['sessions']))
            <form id="sessions" action="{{route('store')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="type"  value="{{$_POST['type']}}">
                <input type="hidden" name="count" value="{{$_POST['count']}}">
                <input type="hidden" name="date" value="{{$_POST['date']}}">
                <table class="table">
                    <tbody>
                        <tr>
                            @foreach($data['sessions'] as $session)
                                    <td>
                                            <input type="checkbox"  name="id"   value="{{ $session['id'] }}">
                                            <label class="free"> {{ $session['session'] }}</label>
                                            <label class="free">мест: {{ $session['places'] }}</label>
                                    </td>

                            @endforeach
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Забронировать</button>
            </form>
        @endif
    </div>
</div>
@endsection


