@extends('layout')

@section('content')

@foreach ($shiftTrades as $trade)
<h1> {{ $trade->id }}</h1>
<li class="list-group-item">
		<p>
			<strong>
				{{$trade->getShift()->getTimeFormattedDateStartEnd()}}
			</strong>
			{{$trade->getOriginalOwnerName()}}
			{{$trade->getNewOwnerName()}}
			@if (!is_null($trade->comment))
				Kommentar: {{$trade->comment}}					
			@endif
			<a href="{{route('adminAcceptTrade', ['id' => $trade->id] )}}" class="btn btn-primary"> {{ $trade->id }} </a>
		</p>
	</li>


@endforeach


@endsection
