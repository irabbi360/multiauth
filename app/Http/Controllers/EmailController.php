<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send(Request $request){
        $title = $request->input('title');
        $content = $request->input('content');

        try{
            Mail::send('mails.send', ['title' => $title, 'content' => $content], function ($message)
            {

                $message->from('me@gmail.com', 'Christian Nwamba');

                $message->to('hello@demo.io');

            });

            return response()->json(['message' => 'Request completed']);
        }
        catch(\Exception $e){
            // Never reached
            return response()->json(['message' => 'Message sending field. Failed to authenticate on SMTP server']);
        }
    }
}
