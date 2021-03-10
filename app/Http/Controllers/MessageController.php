<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSentEvent;
use App\Message;

class MessageController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return auth()
            ->user()
            ->messages()
            ->where(function ($query) {
                $query->bySender(request()->input('sender_id')) 
                    ->byReceiver(auth()->user()->id); 
            })
            ->orWhere(function ($query) {
                $query->bySender(auth()->user()->id)
                    ->byReceiver(request()->input('sender_id'));
            })
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = Message::create([
            'sender_id'   => $request->input('sender_id'),
            'receiver_id' => $request->input('receiver_id'),
            'message'     => $request->input('message'), 
        ]);
        
        $user = \App\User::find($request->input('receiver_id'));  
        event(new MessageSentEvent($user,$message->fresh()));              
        return $message->fresh();
    }
}
