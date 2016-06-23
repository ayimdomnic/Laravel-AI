<?php 

namspace App\Telegram\Commands;

use App\Adventure;
use App\Helpers;
use App\Story;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class SelectStoryCommand extends Command
{
	protected $name ="selectstory";

	protected $description ="Pick a story to play";


	public function handle($arguments)
	{

		$this->replyWithAction(['action' =>'Actions::TYPING']);
		// ARGUMENT IS THE STORY ID I GUESS

		$adventure = Adventure::where('telegram_chat_id', $this->getUpdate()->getMessage()->getChat()->getId())
			->where('active',true)
			->where('complete', false)
			->first();
		if($adventure ==null){
			$this->replyWithMessage(['text'=> "Chose A story from the list below sir"]);

			$list ="";
			// here goes code KungFu
			$id_array[]="";
			// WuTang VS Shaolin(I'm trying code)
			foreach (Story::all() as $story) {
				# code...
				$list .= sprintf('[%s] %s'. PHP_EOL, $story->id, $story->name, $story->description);
				$id_array[] = '/startstory ' . strval($story->id);
				 $this->replyWithMessage(['text' => $list, 'reply_markup' => Helpers::makeKeyboard($id_array)])
			} else{
            //already has an adventure!
            $this->replyWithMessage(['text' => 'You already have a story in progress. Go to /start to change it']);
           }
		}
	}
}