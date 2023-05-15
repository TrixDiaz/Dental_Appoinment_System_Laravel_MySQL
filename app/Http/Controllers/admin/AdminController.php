<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $events = Event::all();
        if (Auth::user()->role === 'admin') {
            return view('admin.index',compact('events'));
        }
        return view('error.404');
    }

    public function requestEdit($id)
    {
        $event = Event::findorFail($id);
        return view('admin.edit-request', compact('event'));
    }

    public function requestUpdate(Request $request, Event $event, int $id)
    {
        $event = Event::findorFail($id);

        $event->reason = $request->input('reason');
        $event->date = $request->input('request-date');
        $event->time_start = $request->input('time-start');
        $event->time_end = $request->input('time-end');
        $event->status = $request->input('status');
        $event->save();

        return view('admin.edit-request', compact('event'))->with('message', 'Successfully Update');
    }

    public function store(Request $request){
       
        $starTime = Carbon::parse($request->input('time_start'));
        $endTime = (clone $starTime)->addHour();

        $validated = Event::create([
            'name' => $request->input('name'),
           'reason' => $request->input('reason'),
            'date' => $request->input('date'),
            'time_start' => $starTime,
            'time_end' => $endTime,
          // 'status' => $request->input('status'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('message', 'Successfully Created');
    }

    /********************************************************************************* users  *******************************************************************/ 

    public function users()
    {
        $users = User::all();
        if (Auth::user()->role === 'admin') {
            return view('admin.user.index', compact('users'));
        }
        return view('error.404');
    }

    public function usersEdit($id)
    {
        $user = User::findorFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user, int $id)
    {
        $user = User::findorFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();

        return view('admin.user.edit', compact('user'))->with('message', 'Successfully Update');
    }
}
