<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{
    protected $fillable = ['story_id','telegram_chat_id','last_updated','current_page', 'active_complete', 'active', 'complete'];


    //relationships

    public function story()
    {
    	return story::find($this->story_id);
    }

    public function
}
