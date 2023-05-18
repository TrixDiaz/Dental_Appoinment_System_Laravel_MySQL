<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
// use Illuminate\Support\Carbon;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all();
        if (Auth::user()->role === 'admin') {
            return view('admin.index',compact('appointments'));
        }
        return view('error.404');
    }

    public function requestEdit($id)
    {
        $appointments = Appointment::findorFail($id);
        return view('admin.edit-request', compact('appointments'));
    }

    public function requestUpdate(Request $request, Appointment $appointments, int $id)
    {
        $appointments = Appointment::findorFail($id);

        $appointments->reason = $request->input('reason');
        $appointments->date = $request->input('request-date');
        $appointments->time_start = $request->input('time-start');
        $appointments->time_end = $request->input('time-end');
        $appointments->status = $request->input('status');
        $appointments->save();

        return view('admin.edit-request', compact('appointments'))->with('message', 'Successfully Update');
    }

    public function store(Request $request){

     $validated = $request->validate([
            "name" => ['required'],
            "title" => ['required'],
            "description" => ['required'],
            "date" => ['required'],
            "time" => ['required'],
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
     ]);
        $validated = Appointment::create($validated);
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
