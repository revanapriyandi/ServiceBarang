<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;

class NotificationBulanBaru extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ["telegram"];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toTelegram($notifiable)
    {
        $txt = "Halo,\n\nData Service telah direstart untuk bulan ini\n\n";

        $txt .= "\nSilakan masuk ke sistem untuk detail lebih lanjut.\n\nSalam Hormat,\n[" . config('app.name') . "]";
        return TelegramMessage::create()
            ->to(config('services.telegram-bot-api.channel_id'))
            ->content($txt)
            ->button('Lihat Detail', 'https://revanapriyandi.tech/');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
