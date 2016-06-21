<? php

namespace App;

use Telegram\Bot\Objects\Update;

class Helpers
{

    public static function makeKeyboard($values = [])
    {
        //split into rows
//        if(count($values) == 2){
//
//        }
//        $keyboard = [
//            ['7', '8', '9'],
//            ['4', '5', '6'],
//            ['1', '2', '3'],
//            ['0']
//        ];
        $keyboard = [$values];

        return \Telegram::replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);
    }

    public static function getCurrentPage($update, $action)
    {
        //get current page from update
        $adventure = Adventure::current($update);
        $was_current_page = $adventure->current_page;
        $adventure->last_page = $was_current_page;
        //convert action to a specific action
        $adventure->save();
    }
    
    public static function getChatID(Update $update)
    {
        return $update->getMessage()->getChat()->getId();
    }
       
}