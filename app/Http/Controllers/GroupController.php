<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
Use App\User;
Use App\Conversation;
use App\Events\GroupCreated;
use App\Events\NewMessage;


class GroupController extends Controller
{
    public function index(){
          $users = User::all();
          return view('groups.index',['users' => $users]);
    }
    public function get(){
        return Group::all(); 
     }
     public function getmessages(Request $request){    
        return Conversation::where(['group_id'=> $request->group_id]); 
     }
     public function sendmessage(Request $request){    

            $message = Conversation::create([
                'user_id'   => $request->input('user_id'),
                'group_id' => $request->input('group_id'),
                'message'     => $request->input('message'),  
            ]); 
            
            $user = \App\User::find($request->input('receiver_id'));  
            event(new NewMessage($user,$message->fresh()));              
            return $message->fresh(); 
     }

    public function store(Request $request) 
    {
        $group = Group::create(['name' => $request->name]);

        $users = collect($request->users); 
        // dd($users);

        $users->push(auth()->user()->id);

        $group->users()->attach($users);    

        broadcast(new GroupCreated($group))->toOthers(); 

        return $group; 
    }
}
