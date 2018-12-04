@extends('layout')

@section('content')
<div id='calendar'></div>
@endsection

@section('footer')

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="http://momentjs.com/downloads/moment-with-locales.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/> 
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css"media='print' />
	
	<script>
	  $(document).ready(function() {
$('#calendar').fullCalendar({
	events: {
    url: '/shifts/all',
    type: 'POST',
    data: {
      custom_param1: 'something',
      custom_param2: 'somethingelse'
    },
    error: function() {
      alert('there was an error while fetching events!');
    },
    color: 'yellow',   // a non-ajax option
    textColor: 'black' // a non-ajax option
  }
});


		</script>
@endsection
