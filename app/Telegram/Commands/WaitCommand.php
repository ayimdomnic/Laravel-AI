<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class WaitCommand extends Command
{

    protected $name = "wait";

    protected $description = "Wait for something else";

    public function handle($arguments)
    {
        //check if waited long enough
        //yup I need a new approach LOL!
        //I'm stuck
        //F1
    }
}