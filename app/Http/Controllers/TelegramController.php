<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api as Telegram;

class TelegramController extends Controller
{
    public function index(){	
		$telegram = new Telegram();
		$telegram->sendMessage([
			'chat_id' => '151336314',
			'text' => 'webhook'
		]);
	}
	public function webhook() {
		$telegram = new Telegram;
		$updates = $telegram->getWebhookUpdates();
		$telegram->sendMessage([
			'chat_id' => '151336314',
			'text' => '' . $updates
		]);
		return 'ok';
	} 
}
