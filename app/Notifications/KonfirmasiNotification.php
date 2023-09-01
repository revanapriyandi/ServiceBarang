<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Kategori;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;

class KonfirmasiNotification extends Notification
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
        $txt = "Halo,\n\nStatus entri di database Barang Masuk telah berubah. Berikut detailnya:\n\n";
        foreach ($data as $key => $id) {
            $data = BarangMasuk::with(['barang', 'teknisi'])->findOrFail($id);
            $kategori = Kategori::where('id', $data->id_kategori)->first();

            if (isset($data->id_kategori)) {
                $txt .= "- Teknisi: {$data->teknisi->name}\n";
                $txt .= "- Barang: {$data->barang->name}\n";
                $txt .= "- MSC Barang: {$data->msc_barang}\n";
                $txt .= "- ID Order: {$data->uid}\n";
                $txt .= "- Keterangan: {$kategori->name}\n\n";
            }
        }
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
