<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;

class IndexController extends Controller
{
    public function __invoke(){
        $messagesOld = Message::orderBy('created_at', 'desc')->get();
        $messages = Message::orderBy('created_at', 'desc')->get();



        $data['viewed'] = 2;
        foreach ($messagesOld as $message){
            $message->update($data);
        }
        return view('message.index', compact('messages'));
    }
}
