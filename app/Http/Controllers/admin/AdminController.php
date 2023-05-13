<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
