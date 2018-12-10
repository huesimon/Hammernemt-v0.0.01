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
        @foreach($stamps as $stamp)
            <tr>
            <th>{{$stamp->startTime}}</th>
            <th>{{$stamp->endTime}}</th>
            <th>{{$stamp->pause}}</th>
            <th>{{$stamp->approved}}</th>
            </tr>
        @endforeach


    </tbody>
</table>

    @endsection