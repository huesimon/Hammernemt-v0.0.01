<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Api;

class TelegramController extends Controller
{
    public function index(){	
		$telegram = new Api();
		$telegram->sendMessage([
			'chat_id' => '151336314',
			'text' => 'webhook'
		]);
		dd($telegram->getMe());
	}
	public function webhook() {
		$updates = Telegram::getWebhookUpdates();
		return 'ok';
	} 
}
