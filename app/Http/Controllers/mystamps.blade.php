@extends('layout')


@section('content')
    <h1>Testing</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Indstemplet</th>
            <th>Udstemplet</th>
            <th>Pause</th>
            <th>Godkendt</th>
        </tr>
        </thead>

        <tbody>
        @foreach($myStamps as $myStamp)
            <tr>
                <th>{{$myStamp->start_time}}</th>
                <th>{{$myStamp->end_time}}</th>
                <th>{{$myStamp->pause}}</th>
                <th>{{$myStamp->approved}}</th>
            </tr>
        @endforeach


        </tbody>
    </table>

    <select>
        <option value="1">Januar</option>
        <option value="2">Febuar</option>
        <option value="3">Marts</option>
        <option value="4">April</option>
        <option value="5">Maj</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>


@endsection