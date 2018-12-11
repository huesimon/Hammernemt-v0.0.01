@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>
    <body>
        <div class="container">
            <div class="content">
				<div class="title">{{env('APP_ENV')}} HAMMERNEMT</div>
			</div>
			<div class="content">
				<h1>
					<a href="{{route('calendar')}}">Stempling</a>
				</h1>
				<h1>
					<a href="{{route('calendar')}}">Vagtplan</a>
				</h1>
				<h1>
					<a href="{{route('tradeList')}}">Ledige vagter</a>
				</h1>
				<h1>
					<a href={{route('myCalendar', [
						'id' => Auth::user()->id
						])}}>Mine timer</a>
				</h1>
				<h1>
					<a href={{route('adminTradeList')}}>
						Admin se liste over byt
					</a>
				</h1>
				
			</div>

        </div>
    </div>
</div>
@endsection
