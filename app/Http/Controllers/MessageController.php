<?php

namespace App\Http\Controllers;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(){
        $message = request() -> validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:5',
        ], [
            'name.required' => __('I need your name')
        ]);

        //* enviar emails
        Mail::to('victormanuelluishernandez@gmail.com') -> queue(new MessageReceived($message));

        // return new MessageReceived($message);

        return back() -> with('status', 'Message recived');
    }
}