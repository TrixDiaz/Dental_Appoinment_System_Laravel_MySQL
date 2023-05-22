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

        $user = User::find(1);
        
        if($user){
        $message['hi'] = "This is an update from the System - {$user->name}";
        $message['event'] = "Please click the Link Below to see the Update on your Appointment - {$user->name}";
        $user->notify(new UpdateNotification($message));
        dd('Email send successfully');

        }
    }

}
