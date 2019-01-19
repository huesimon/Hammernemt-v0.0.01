<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shift;
use App\User;
use Carbon\Carbon;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Spatie\GoogleCalendar\Event as Event;


class CalendarController extends Controller
{
	public function index () {
		$events = [];

		$shifts = Shift::get();
		
		if($shifts->count()) {
			foreach ($shifts as $shift) {
				$events[] = Calendar::event(
					$shift->getUserName() . '',
					false,
					new \DateTime($shift->start_time),
					new \DateTime($shift->end_time),
					null,
					// Add color and link on event
					[
						'color' => '#ff0000',
						'url' => '/shift/release/' . $shift->id,
					]
				);
			}
		}
		
		$calendar = Calendar::addEvents($events)->setOptions([
			'header' => [
				'left' => 'prev,next today',
				'center' => 'title',
				'right' => 'month,agendaWeek,agendaDay,listWeek',
			],
			'defaultView' => 'month',
			'eventLimit' => true,
			'nowIndicator' => true,
			'weekends' => true,
			'minTime' => '06:00:00',
			'maxTime' => '24:00:00',
			'height' => 885,
		]);
		return view('user.calendar.index', compact('calendar'));
	
	}

    public function myCalendar (User $user) {
		$events = [];

		$shifts = Shift::myShift($user->id)->get();
		if($shifts->count()) {
			foreach ($shifts as $shift) {
				$events[] = Calendar::event(
					$shift->id . '',
					false,
					new \DateTime($shift->start_time),
					new \DateTime($shift->end_time),
					null,
					// Add color and link on event
					[
						'color' => '#ff0000',
						'url' => '/shift/release/' . $shift->id,
					]
				);
			}
		}
		
		$calendar = Calendar::addEvents($events)->setOptions([
			'header' => [
				'left' => 'prev,next today, myCustomButton',
				'center' => 'title',
				'right' => 'month, agendaWeek, agendaDay, listWeek',
			],
			'defaultView' => 'agendaWeek',
			'eventLimit' => true,
			'nowIndicator' => true,
			'weekends' => true,
			'minTime' => '06:00:00',
			'maxTime' => '24:00:00',
			'height' => 885,
		]);
		return view('user.calendar.index', compact('calendar', 'user'));
	
	}
	public function exportToICS(?User $user){
		$fileName = $user->getNameWithoutSpaces() . "_hammernemt.ics";
	
		$icsOutput = 
"BEGIN:VCALENDAR
PRODID:-//Hammernemt.dk//Google Calendar 70.9054//EN
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-CALNAME:Test Calendar
X-WR-TIMEZONE:Europe/Copenhagen";
		$shifts = Shift::myShift($user->id)->get();
		foreach ($shifts as $shift) {
		$icsOutput = $icsOutput .
"
BEGIN:VEVENT
DTSTART:" . $shift->getStatTimeIso8601ZuluString() ."
DTEND:" .  $shift->getStatTimeIso8601ZuluString() . "
DTSTAMP:20190119T134843Z
CREATED:20190119T134831Z
DESCRIPTION:
LAST-MODIFIED:20190119T134831Z
LOCATION:
SEQUENCE:0
STATUS:CONFIRMED
SUMMARY:test
TRANSP:OPAQUE
END:VEVENT";
		}
		$icsOutput = $icsOutput . PHP_EOL . "END:VCALENDAR";
		header("Content-type: text/ics");
		header("Cache-Control: no-store, no-cache");
		header('Content-Disposition: attachment; filename="' . $fileName . '"');
		echo $icsOutput;
		$file = fopen('php://output','w');
	}
}