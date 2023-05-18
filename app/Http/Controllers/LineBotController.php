<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recipe;
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use Illuminate\Support\Facades\Log;

class LineBotController extends Controller
{
    public function webhook(Request $request)
    {
        if (isset($request->events[0])) {
            $event = $request->events[0];
            $lineUserId = $event['source']['userId'];
            $messageText = $event['message']['text'];

            $user = User::where('line_user_id', $lineUserId)->first();

            if ($user) {
                $recipe = $user->recipes()->where('menu', $messageText)->first();

                if ($recipe) {
                    $httpClient = new CurlHTTPClient('+vw2qTy3ZEEWO1WP2tdaJFhVVrpGtaktSHA7DxeXSzTk/pBfbXVbfV64nBaBSWV2qVMWJ2dvFC/WLNBbkIbTe12wtj0jTMubgUsglt0wnbAZtKWb84dIcT8QjSWrRL08Kvs9kC6/TjvJajU+tQ975wdB04t89/1O/w1cDnyilFU=');
                    $bot = new LINEBot($httpClient, ['channelSecret' => 'c46eb33aba93a54fc17ace9f84938ec2']);

                    $textMessageBuilder = new TextMessageBuilder('レシピ名: '. "\n" . $recipe->menu . "\n". "\n". 'レシピ内容: '. "\n" . $recipe->ingredient);
                    $response = $bot->pushMessage($lineUserId, $textMessageBuilder);

                    if ($response->isSucceeded()) {
                        Log::info('Success!');
                    } else {
                        Log::error('Failed!');
                    }
                } else {
                    Log::info('Recipe not found!');
                }
            } else {
                Log::info('User not found!');
            }
        }else {
            Log::info('User not found!');
        }
    }
}

