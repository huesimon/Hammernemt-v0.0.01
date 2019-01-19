<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shift;
use App\User;
use Telegram\Bot\Api;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;


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
				'left' => 'prev,next today',
				'center' => 'title',
				'right' => 'month,agendaWeek,agendaDay,listWeek',
			],
			'defaultView' => 'agendaWeek',
			'eventLimit' => true,
			'nowIndicator' => true,
			'weekends' => true,
			'minTime' => '06:00:00',
			'maxTime' => '24:00:00',
			'height' => 885,
		]);
		//Telegram debug
		$telegram = new Api();
		$telegram->sendMessage([
			'chat_id' => '-386115157',
			'text' => '' . $user->getName() . ' ser sin kalender'
		]);
		return view('user.calendar.index', compact('calendar'));
	
	}
}
