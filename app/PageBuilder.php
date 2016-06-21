<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageBuilder 
{
   

    //I hate it when I have to write raw php but I love Ai too Much

    public static function build(Page $page) 
    {
    	//build a new reply instance
    	$result = [];

    	$result['text'] = "*" .$page->title."*".PHP_EOL;
    	$results['text'].= $page->content;

    	//add sections to end 
    	$result['text'].= PHP_EOL.'Whats on your Mind Champ?'.PHP_EOL;
    	foreach ($page ->actions as $action) {
    		# code...
    		$result['text'].="_".$action->description."_".PHP_EOL;
    	}

    	//YO I don't know what I'm writting lol tests in a few
    	$result['parse_mode'] = $page->parse_mode;
        //get actions
        $result['reply_markup'] = \Telegram::replyKeyboardMarkup([
            'keyboard' => self::convertActionsToButtons($page->actions),
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);;
//        $result['reply_markup'] = self::convertActionsToButtons($page->actions);
        //build keyboard
        return $result;
    }

    public static function convertActionsToButtons($actions)
    {
        $result = [];
        //single row each - limit to 5?
        foreach($actions as $action){
            array_push($result,[sprintf('/%s %s',$action->type, $action->name)]);
//            Log::info(json_encode($action));
        }

        // $dd($result)
        
        return $result;
    }
}
