<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\MailNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Notifications\UpdateNotification;


class MailController extends Controller
{
    public function index(){
        // $mailData = [
        //     'title' => 'Mail from Me',
        //     'body' => 'This is for Testing Email',
        // ];

        // Mail::to('johndarlucio@icloud.com')->send(new MailNotification($mailData));

        // dd('Email send successfully');

        $user = User::find(1);

        $message['hi'] = "This is update from the System {$user->name}";
        $user->notify(new UpdateNotification($message));
        dd('Email send successfully');
    }
}
