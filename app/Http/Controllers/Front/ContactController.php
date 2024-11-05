<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
class ContactController extends Controller
{
    public function index(){
        return view('front.contact');
    }

    public function sendMessage(Request $request){
        // validations
        $request->validate(
            [
                "name" => ["required","string","min:3","max:30"],
                "email" => ["required","email"],
                "subject" => ["required","string","min:5","max:50"],
                "content" => ["required","min:10","max:500"],
            ]
        );

        // connect to database
        $message = new Message();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->content;

        $message->save();

        return redirect('contact')->with('success', 'Your message has been sent successfully')  ;
    }
}
