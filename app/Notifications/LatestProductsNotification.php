<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class LatestProductsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $products;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $latestProducts = Product::orderBy('created_at')->take(10)->select(['name','price'])->get();

        $text = '';
        /** @var Product $product */
        foreach ($latestProducts as $product) {
            $text .= "$product->name $product->price <br>";
        }
        return (new MailMessage)
            ->line('This is our latest products')
            ->line(new HtmlString($text));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
