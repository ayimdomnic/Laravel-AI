<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    //
     protected $fillable = [
        'name', 'description', 'tags','webhook','active',
    ];


    //relationships

    public function pages()
    {
    	return $this->hasMany(Page::class);
    }

    public function first_page()
    {
    	return Page::find($this->first_page);
    }

    public function registerStartStoryCommand()
    {
    	// this should prolly come on the console or a better palce
    	// refactor this to accomodate more conventional code
    	// try die and dumping to see if the command picks too
    	// Todo::Major refactor bruh()->major LOL
    	$command = new \App\Commands\StartStoryController();
    	\Telegram::addCommand($command);
    }
}
