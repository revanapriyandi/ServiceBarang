<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use NotificationChannels\Telegram\TelegramUpdates;

class TelegramController extends Controller
{
    public function getChatId()
    {
        $updates = TelegramUpdates::create()
            ->options([
                'timeout' => 0,
            ])
            ->get();

        if ($updates['ok']) {
            // Chat ID
            return $updates['result'];
        }
    }
}
