<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WebhookController extends Controller
{
    public function webhook(Request $request)
    {
    	//include the neccessary packages
    	$update = Telegram::commandsHandler(true);

    	Log::info('Webhook Received:' . json_encode($update));

        return 'OK';
    }
}
