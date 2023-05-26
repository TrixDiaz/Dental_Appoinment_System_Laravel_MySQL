<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
// use Illuminate\Support\Carbon;
use App\Models\Appointment;
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
        // Find the appointment by ID
        $appointments = Appointment::findOrFail($id);

        // Update the appointment record
        $appointments->title = $request->input('title');
        $appointments->description = $request->input('description');
        $appointments->start = $request->input('start');
        $appointments->end = $request->input('end');
        $appointments->doctor = $request->input('doctor');
        $appointments->status = $request->input('status');
        $appointments->save();

        // Check if the appointment status is approved
        if ($appointments->status === 'Approved') {
            // Find the user associated with the appointment
            $user = User::where('name', $appointments->name)
                ->where('email', $appointments->email)
                ->firstOrFail();

            // Sending email notification
            $message['hi'] = "This is an update from the System - {$user->name}";
            $message['event'] = "Please click the Link Below to see the Update on your Appointment - {$user->name}";
            $user->notify(new UpdateNotification($message));

            // Insert selected appointment data into the Events table
            $event = new Event;
            $event->title = $appointments->title;
            $event->description = $appointments->description;
            $event->start = $appointments->start;
            $event->end = $appointments->end;
            $event->doctor = $appointments->doctor;
            $event->status = $appointments->status;
            $event->save();

            return back()->with('message', 'Successfully Update', compact('appointments'));
        }

        $user = User::where('name', $appointments->name)
            ->where('email', $appointments->email)
            ->firstOrFail();

        // Sending email notification
        $message['hi'] = "This is an update from the System - {$user->name}";
        $message['event'] = "Please click the Link Below to see the Update on your Appointment - {$user->name}";
        $user->notify(new UpdateNotification($message));

        return back()->with('message', 'Successfully Update', compact('appointments'));
    }

    public function store(Request $request)
    {

        Validator::make($request->all(), [
            'name'  =>  'required|string|max:191',
            'email'  =>  'required|string|max:191',
            'title'  =>  'required|string|max:191',
            'description'   =>  'required|string|max:191',
            'start' => ['required'],
            'doctor' => ['required'],
            'end' => ['required', 'string', 'max:255'],
        ]);

        $push  = Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'description' => $request->description,
            'start' => $request->start,
            $doctors = 'doctor' => $request->doctor,
            'end' => $request->end,
        ]);
        event(new Registered($push));

        $doctors = User::count();
        $user = User::findorFail($doctors);
       
        $message['hi'] = "This is an update from the System - {$user->name}";
        $message['event'] = "and will serve as confirmation for your Appointment Request for Acebedo Clinic link provided below - {$user->name}";
        $user->notify(new UpdateNotification($message));

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


    /********************************************************************************* Calendar  *******************************************************************/

    public function calendar(Request $request)
    {

        $events = array();
        $bookings = Event::all();
        foreach ($bookings as $booking) {
            $events[] = [
                'title' => $booking->title,
                'start' => $booking->start,
                'end' => $booking->end,
                'name' => $booking->name,
            ];
        }
        return view('calendar.index', compact('events'));
    }
}
