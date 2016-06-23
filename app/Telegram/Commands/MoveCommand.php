<?php

namespace App\Telegram\Commands;

use App\Adventure;
use App\PageBuilder;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class MoveCommand extends Command
{
    protected $name = "go";

    protected $description = "Move to another page";

    public function handle($arguments)
    {
        //the argument has the action name
        $this->replyWithMessage(['text'=>'You went '.$arguments]);
//        /parse this with the update object
        $adventure = Adventure::current($this->getUpdate());
        
        if($adventure != null){
//            get argument
            $last_page = $adventure->current_page;
            $adventure->last_page = $last_page;
            $possible_actions = $last_page->actions;
            $selected_action = null;
            //check argument is in possible actions
            foreach($possible_actions as $action){
                if($action->name == $arguments){
                    //this is the action taken
                    $next_page = $action->next_page;
                    $adventure->current_page = $next_page;
                    $this->replyWithMessage(PageBuilder::build($next_page));
                    $adventure->save();
                }
            }

            if(is_null($selected_action))
            {
                $this->replyWithMessage(['text'=> "Oops! I couldn't find that action... Try again"]);
                return;
            }
        }
        else{
            $this->replyWithMessage(['text'=> "Oops! I couldn't find your adventure. Try again"]);
        }
    }
}