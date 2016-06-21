<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected function = [
    	'name', 'description', 'type','page_id', 'parameters', 'keyboard'
    ];
    //upgrade to MySQL 5.7 in order to use array func on the schema
    protected $casts = [ 'parameters' => 'array','keyboard'=>'array'];

    public function page()
    {
    	return $this->belongsTo(Page::class);
    }
}
