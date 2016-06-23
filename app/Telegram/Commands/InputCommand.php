<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class InputCommand extends Command
{
    protected $name = "input";

    protected $description = "Get a user defined input";

    public function handle($arguments)
    {
        //the argument is the input value
        // the common arguments issued
    }
}