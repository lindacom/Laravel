<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
Use App\Mail\SupportTicket;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function postContact() {

        // when you submit a post request we validate the email
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'question' => 'required',
            'verifiation' => 'required|in:5,five'
        ]);

        // we send an email
        Mail::to(config('app.SupportEmail'))->send(
            new SupportTicket(request('email'), request('question'))
        );

        // we flash a confirmation message
        flash()->overlay(
            'Message Sent!',
            'I will get back to you as soon as possible.'
        );

return redirect('/');
    }
}
