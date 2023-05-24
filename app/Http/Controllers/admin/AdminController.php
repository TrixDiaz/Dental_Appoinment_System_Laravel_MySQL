<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Appointment;
// use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Notifications\UpdateNotification;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {

        $appointments = Appointment::all();
        if (Auth::user()->role === 'admin') {
            return view('admin.index', compact('appointments'));
        }
        return view('error.404');
    }

    public function requestEdit($id)
    {
        $doctors = DB::table('users')
            ->select('users.*')
            ->where('type', '=', 'doctor')
            ->get();
        $appointments = Appointment::findorFail($id);
        return view('admin.edit-request', compact('appointments', 'doctors'));
    }

    public function requestUpdate(Request $request, Appointment $appointments, int $id)
    {

        $appointments = Appointment::findorFail($id);

        $count = Appointment::join('users', function ($join) {
            $join->on('appointments.name', '=', 'users.name')
            ->on('appointments.email', '=', 'users.email');
        })
        ->count();   


        $user = User::findorFail($count);

        $message['hi'] = "This is an update from the System - {$user->name}";
        $message['event'] = "Please click the Link Below to see the Update on your Appointment - {$user->name}";
        $user->notify(new UpdateNotification($message));

        $appointments->description = $request->input('title');
        $appointments->description = $request->input('description');
        $appointments->date = $request->input('date');
        $appointments->time = $request->input('time');
        $appointments->status = $request->input('doctor');
        $appointments->status = $request->input('status');
        $appointments->save();

        return back()->with('message', 'Successfully Update', compact('appointments'));
    }

    public function store(Request $request)
    {
        $users = Auth::check();
        $user = User::findorFail($users);

        if ($user) {

            $message['hi'] = "This is an update from the System - {$user->name}";
            $message['event'] = "and will serve as confirmation for your Appointment Request for Acebedo Clinic link provided below - {$user->name}";
            $user->notify(new UpdateNotification($message));

            Validator::make($request->all(), [
                'name'  =>  'required|string|max:191',
                'email'  =>  'required|string|max:191',
                'title'  =>  'required|string|max:191',
                'description'   =>  'required|string|max:191',
                'date' => ['required', 'string', 'max:255'],
                'doctor' => ['required', 'string', 'max:255'],
                'time' => ['required', 'string', 'max:255'],
            ]);

            $push  = Appointment::create([
                'name' => $request->name,
                'email' => $request->email,
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'doctor' => $request->doctor,
                'time' => $request->time,
            ]);
            event(new Registered($push));

            return back()->with('message', 'Successfully Created');
        }

        return back()->with('delete', 'Something went wrong!');
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


    public function createUser(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $validated = User::create($validated);
        return back()->with('message', 'Successfully Created');
    }

    public function usersEdit($id)
    {
        $user = User::findorFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user, int $id)
    {
        $user = User::findorFail($id);

        if ($user) {

            $message['hi'] = "This is an update from the System - {$user->name}";
            $message['event'] = "Please click the Link Below to see the Update on your Profile - {$user->name}";
            $user->notify(new UpdateNotification($message));

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->role = $request->input('role');
            $user->type = $request->input('type');
            $user->save();

            return back()->with('update', 'Successfully Update', compact('user'));
        }
    }


    /********************************************************************************* dashboard  *******************************************************************/

    public function dashboard()
    {
        $appointments = Appointment::where('status', '=', 'pending')->count();
        $doctors = User::where('type', '=', 'doctor')->count();
        $users = User::count();

        if (Auth::user()->role === 'admin') {
            return view('admin.dashboard.index', compact('appointments', 'users', 'doctors'));
        }
        return view('error.404');
    }
}
