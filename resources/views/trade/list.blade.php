@extends('layout')

@section('content')

<ul class="list-group">
	@foreach ($tradeableShfits as $tradeableShift)
		<li class="list-group-item">
			<p>
				{{$tradeableShift->getShift()->getTimeFormattedDateStartEnd()}}

				@if (!is_null($tradeableShift->comment))
					Kommentar: {{$tradeableShift->comment}}					
				@endif
				<a href={{route('acceptTrade', ['id' => $tradeableShift->id] )}} class="btn btn-primary"> {{ $tradeableShift->id }} </a>
			</p>
		</li>
	@endforeach
</ul>


@endsection