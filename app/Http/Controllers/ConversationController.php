<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation; 

class ConversationController extends Controller
{
    public function store(Request $request)
    {
        $conversation = Conversation::create([
            'message' =>  $request('message'),
            'group_id' =>  $request('group_id'),
            'user_id' => auth()->user()->id,
        ]);
        broadcast(new NewMessage($conversation))->toOthers(); 
        return $conversation->load('user');   
    }
}
