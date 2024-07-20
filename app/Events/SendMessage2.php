<?php

namespace App\Events;

use App\Models\admin\Company;
use App\Models\User;
use App\Models\website\Coversation;
use App\Models\website\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage2 implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $reciever;
    public $conversation;
    public $message;

    public function __construct(User $sender, Company $reciever, Coversation $conversation, Message $message)
    {
        $this->sender = $sender;

        $this->reciever = $reciever;

        $this->conversation = $conversation;

        $this->message = $message;
    }

    public function broadcastWith()
    {
        return [
            'sender_username' => $this->sender->username,
            'receiver_username' => $this->reciever->username,
            'conversation_id' => $this->conversation->id,
            'body' => $this->message->id,
        ];

    }

    public function broadcastOn()
    {
        error_log($this->sender);
        error_log($this->reciever);
        return new PrivateChannel('chat2.' . $this->reciever->id);

    }
}
