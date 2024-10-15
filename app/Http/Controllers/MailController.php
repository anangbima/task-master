<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request) {
        $mailData = [
            'title'     => 'Test email',
        ];

        Mail::to('bimaperdana11@gmail.com')->send(new SendMail($mailData));
    }
}
