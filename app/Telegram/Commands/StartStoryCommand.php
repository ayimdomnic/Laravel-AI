<?php

namespace App\Telegram\Commands;

use App\Adventure;
use App\PageBuilder;
use App\Story;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class StartStoryCommand extends Command
{
    protected $name = "startstory";

    protected $description = "Starts the story";

    public function handle($arguments)

    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        if(intval($arguments) != 0) {
            $story = Story::find(intval($arguments));
            //check not had message before!!! -
            if ($story != null) {
                $adventure = Adventure::create([
                    'story_id'=> $story->id,
                    'telegram_chat_id'=> $this->getUpdate()->getMessage()->getChat()->getId(),
                    'last_updated'=> Carbon::now(),
                    'current_page' => $story->first_page,
                    'active'=> true,
                    'complete'=> false,
                ]);
//                $this->replyWithMessage(['text'=> json_encode($adventure)]);
                $this->replyWithMessage(['text' => "Lets begin '".$story->name."'"]);
                //send first page
                //page builder
                $first_page = $adventure->story()->first_page();
//                $this->replyWithMessage(['text'=>json_encode($first_page)]);
                $this->replyWithMessage(PageBuilder::build($first_page));
            } else {
                $this->replyWithMessage(['text' => "Oops, I AM TOO SMART FOR YOUR QUERY LOL"]);
            }
        }
        else
            $this->replyWithMessage(['text' => "Oops, That doesn't make sense son, think SMH"]);
    }
}