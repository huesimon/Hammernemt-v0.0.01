@extends('layout')

@section('content')

<ul class="list-group">
	@foreach ($tradeableShfits as $shift)
		<li class="list-group-item">
			<a href="#" class="btn btn-primary"> {{ $shift->id }} </a>
		</li>
	@endforeach
</ul>


@endsection