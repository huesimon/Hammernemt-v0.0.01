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
	defaultDate: '2018-03-12',
	editable: true,
	header: {
	left: 'prev,next today',
	center: 'title',
	right: 'listDay,listWeek,month'
	},
	// customize the button names,
	// otherwise they'd all just say "list"
	views: {
	listDay: { buttonText: 'list day' },
	listWeek: { buttonText: 'list week' }
	},

	eventLimit: true, // allow "more" link when too many events
	events: [
		{
		title: 'All Day Event',
		start: '2018-03-01'
		},
		{
		title: 'Long Event',
		start: '2018-03-07',
		end: '2018-03-10'
		},
		{
		id: 999,
		title: 'Repeating Event',
		start: '2018-03-09T16:00:00'
		},
		{
		id: 999,
		title: 'Repeating Event',
		start: '2018-03-16T16:00:00'
		},
		{
		title: 'Conference',
		start: '2018-03-11',
		end: '2018-03-13'
		},
		{
		title: 'Meeting',
		start: '2018-03-12T10:30:00',
		end: '2018-03-12T12:30:00'
		},
		{
		title: 'Lunch',
		start: '2018-03-12T12:00:00'
		},
		{
		title: 'Meeting',
		start: '2018-03-12T14:30:00'
		},
		{
		title: 'Happy Hour',
		start: '2018-03-12T17:30:00'
		},
		{
		title: 'Dinner',
		start: '2018-03-12T20:00:00'
		},
		{
		title: 'Birthday Party',
		start: '2018-03-13T07:00:00'
		},
		{
		title: 'Click for Google',
		url: 'http://google.com/',
		start: '2018-03-28'
		}
	]
	});

});
		</script>
@endsection
