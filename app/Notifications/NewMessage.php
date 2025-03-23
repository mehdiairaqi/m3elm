<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewMessage extends Notification
{
    use Queueable;

    protected $messageContent;

    // Constructor to accept message content
    public function __construct($messageContent)
    {
        $this->messageContent = $messageContent;
    }

    // Define the notification channels (database in this case)
    public function via($notifiable)
    {
        return ['database'];  // We are using database to store messages
    }

    // Store the message in the database
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->messageContent,
            'sender_id' => auth()->id(), // Store the sender's user ID
            'receiver_id' => $notifiable->id, // Store the receiver's user ID
        ];
    }
}

