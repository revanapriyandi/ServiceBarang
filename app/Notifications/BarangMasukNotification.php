<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Http\Controllers\TelegramController;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;

class BarangMasukNotification extends Notification
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
        $data = $this->data;
        $txt = "Halo,\n\nEntri baru telah dibuat di database Barang Masuk dengan perincian berikut:\n\n";
        $url = 'https://revanapriyandi.tech/';

        foreach ($data as $key => $value) {
            $barang = Barang::where('uid', $value['barang'])->first();
            $teknisi = User::where('id', $value['teknisi'])->first();
            $txt .= "- Teknisi: " . $teknisi->name . "\n";
            $txt .= "- Barang: " . $barang->name . "\n";
            $txt .= "- MSC Barang: " . $value['msc_barang'] . "\n";
            $txt .= "- Order ID: " . $value['id_order'] . "\n\n";
        }

        $txt .= "Silakan masuk ke sistem untuk detail lebih lanjut.\n\nHormat kami,\n" . config('app.name') . "";

        return TelegramMessage::create()
            ->to(config('services.telegram-bot-api.channel_id'))
            ->content($txt)
            ->button('Lihat', $url);
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
