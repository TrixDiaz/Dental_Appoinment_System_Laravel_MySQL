<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return view('admin.index');
        }
        return view('error.404');
    }

    public function users(){
        $users = User::all();
        if (Auth::user()->role === 'admin') {
            return view('admin.users',compact('users'));
        }
        return view('error.404');
    }

    public function store(Request $request){
        $user = Auth::user()->name;
        $validated = $request->validate([
            "reason" => ['required'],
            "time_start" => ['required'],
            "date" => ['required'],
            "name" => $user,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        $validated = Event::create($validated);
        return back()->with('message', 'Successfully Created');
    }
}
