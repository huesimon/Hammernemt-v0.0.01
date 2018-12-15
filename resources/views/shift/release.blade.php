@extends('layouts.app')

@section('content')


<form method="POST" action="/shift/release/{{$shift->id}}">
	@csrf
	<div class="form-group">
	<label for="exampleInputEmail1">{{ $shift->id }}</label>
	</div>
	<div class="form-group">
	  <label for="exampleInputPassword1">{{ $shift->getTimeFormattedDateStartEnd() }}</label>
	</div>
	
	<div class="form-group">
	  <label for="exampleTextarea">Skriv en kommentar til frigivelsen af din vagt</label>
	  <input type="text" name="comment" value="testing">
	</div>
	<input type="hidden" name="shiftId" value="{{$shift->id}}">
	<input type="hidden" name="userId" value="{{Auth::user()->id}}">
	<button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
