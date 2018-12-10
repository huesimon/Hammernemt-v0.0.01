@extends('layout')

@section('content')

	@foreach ($tradeableShfits as $tradeableShift)


	<div class="card" >
		<div class="card-body">
		<h4 class="card-title"> {{ $tradeableShift->getOriginalOwnerName()}}</h4>
			<p class="card-text">
				{!! $tradeableShift->getShift()->getTimeFormattedDateStartEndNewLine() !!}
			</p>
			@if (!is_null($tradeableShift->comment))
				<p class="card-text">
					Kommentar: {{$tradeableShift->comment}}		
				</p>					
			@endif

			<a href={{route('acceptTrade', ['id' => $tradeableShift->id] )}} class="btn btn-primary"> Anmod om vagt</a>
		</div>
	</div>
	@endforeach

@endsection