@extends('layouts.calendar')
@section('meta')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
	
@endsection
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 col-sm-12">
			<div class="card">
				<div class="card-header">Calendar</div>
				{!! $calendar->calendar() !!}

				{!! $calendar->script() !!}
			</div>
		</div>					
	</div>
</div>
@endsection