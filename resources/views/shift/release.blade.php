@extends('layout')

@section('content')

{!! Form::open(array('url' => 'shift/release')) !!}
<div class="form-group">
   {!! Form::label($shift->id, null, ['class' => 'form-control']) !!}
   {!! Form::label($shift->getDate(), null, ['class' => 'form-control'])!!}
   {!! Form::label('Start: ' . $shift->getStartTime() . ' Slut: ' . $shift->getEndTime(), null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
   {!! Form::label('Kommentar', null, ['class' => 'form-control']) !!}
   {!! Form::text('comment', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Frigiv vagt', ['class' =>'btn btn-primary form-control']) !!}
</div>

{!!Form::close() !!}

{{-- <form action="/shift/release/{{$shift->id}}">
	<div class="form-group">
	<label for="exampleInputEmail1">{{ $shift->id }}</label>
	</div>
	<div class="form-group">
	  <label for="exampleInputPassword1">{{ $shift->getTimeFormattedDateStartEnd() }}</label>
	</div>
	
	<div class="form-group">
	  <label for="exampleTextarea">Skriv en kommentar til frigivelsen af din vagt</label>
	  <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
  </form> --}}

@endsection
