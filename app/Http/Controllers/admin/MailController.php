<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Mail\MailNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        $mailData = [
            'title' => 'Mail from Me',
            'body' => 'This is for Testing Email',
        ];

        Mail::to('johndarlucio@icloud.com')->send(new MailNotification($mailData));

        dd('Email send successfully');
    }
}
