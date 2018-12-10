@extends('layout')

@section('content')

@foreach ($shiftTrades as $trade)
	<div class="card" >
		<div class="card-body">
		<h4 class="card-title"> Fra: {{ $trade->getOriginalOwnerName()}}</h4>
		<h4 class="card-title"> Til: {{ $trade->getNewOwnerName()}}</h4>
		
			<p class="card-text">
				{!! $trade->getShift()->getTimeFormattedDateStartEndNewLine() !!}
			</p>
			@if (!is_null($trade->comment))
				<p class="card-text">
					Kommentar: {{$trade->comment}}		
				</p>					
			@endif

			<a href={{route('acceptTrade', ['id' => $trade->id] )}} class="btn btn-success"> Godkend vagt</a>
		</div>
	</div>


@endforeach


@endsection
