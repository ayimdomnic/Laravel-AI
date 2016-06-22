<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class RepeatCommand extends Command
{
    protected $name = "repeat";

    protected $description = "Repeats the last page";
    
    public function handle($arguments)
    {
        //go back a page
    }
}