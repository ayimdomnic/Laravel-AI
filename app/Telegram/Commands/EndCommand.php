<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\command;

class EndCommand extends Command
{
	protected $name ="end";

	protected $description ="End the story";


	public function handle($arguments)
	{
		// end to a story/ close the whole adventure

		// what to write

		
	}
}