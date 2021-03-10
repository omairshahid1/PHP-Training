<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Message;
use App\User;


class MessageSentEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Message
     */
    public $user;
    public $message;


    /**
     * Create a new event instance.
     *
     * @param Message $message
     */
    public function __construct(User $user, $message) 
    {
        $this->user = $user;
        $this->message = $message;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */ 

    public function broadcastOn()    
    {
        return new Channel('Message.'.$this->user->id);      
    }
    public function broadcastAs()     
    {  
        return 'MessageSentEvent';   
    }
    public function broadcastWith()   
    {  
        return [
            'user' => $this->user, 
            'message' => $this->message      
        ];
    }
}
