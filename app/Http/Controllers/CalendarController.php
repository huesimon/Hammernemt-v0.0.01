<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shift;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;


class CalendarController extends Controller
{
	public function index () {
		$events = [];

		$shifts = Shift::get();
		
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
				'left' => 'prev,next today',
				'center' => 'title',
				'right' => 'month,agendaWeek,agendaDay',
			],
			'defaultView' => 'month',
			'eventLimit' => true,
			'nowIndicator' => true,
			'weekends' => false,
			'minTime' => '06:00:00',
			'maxTime' => '24:00:00',
		]);
		return view('user.calendar.index', compact('calendar'));
	
	}

    public function myCalendar ($userId) {
		$events = [];

		$shifts = Shift::myShift($userId)->get();
		
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
				'left' => 'prev,next today',
				'center' => 'title',
				'right' => 'month,agendaWeek,agendaDay',
			],
			'defaultView' => 'agendaWeek',
			'eventLimit' => true,
			'nowIndicator' => true,
			'weekends' => false,
			'minTime' => '06:00:00',
			'maxTime' => '24:00:00',
		]);
		return view('user.calendar.index', compact('calendar'));
	
	}
}
