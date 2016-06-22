<?php

namespace App\Telegram\Commands;

use App\Adventure;
use App\Helpers;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected $name = "start";

    protected $description = "Start the story";
    
    public function handle($arguments)
    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        //check if argument has a value already
        if ($arguments == 'again') {
            //delete all adventures where chat_id is current
            Adventure::where('telegram_chat_id',$this->getUpdate()->getMessage()->getChat()->getId())->delete();
            $this->replyWithMessage(['text' => "Let's start a new story. /selectstory"]);
            return;
        } elseif ($arguments == 'ignore') {
            //continue existing story
            $this->replyWithMessage(['text' => "Continue existing story"]);
            //get current page and reshow
            $current_page = Adventure::where('telegram_chat_id',$this->getUpdate()->getMessage()->getChat()->getId())->first()->current_page();
            $this->replyWithMessage(['text' => json_encode($current_page)]);
            return;
        } else {
            $adventure = Adventure::where('telegram_chat_id',$this->getUpdate()->getMessage()->getChat()->getId())
                ->where('active',true)
                ->where('complete',false)
                ->first();
            if ($adventure == null) {
                //new adventure
                $this->replyWithMessage(['text' => "Let's begin your latest quest! /selectstory"]);
            } else {
                $this->replyWithMessage(['text' => "You have already started a story. Do you want to quit this and start again?", 'reply_markup' => Helpers::makeKeyboard(['/start again', '/start ignore'])]);
            }
        }
    }
}