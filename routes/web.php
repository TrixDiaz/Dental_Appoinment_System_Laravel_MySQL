<?php

use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\MailController;
use App\Http\Controllers\admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
      return view('welcome');
});

Route::get('dashboard', function () {
    $events = DB::select('select * from appoinment where active = ?');
    return view('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $doctors = DB::table('users')
            ->select('users.*')
            ->where('type', '=', 'doctor')
            ->get();
        $user = Auth::User()->name;
        $appointments = DB::table('appointments')
            ->join('users', 'appointments.name', '=', 'users.name')
            ->select('users.*', 'appointments.*')
            ->where('appointments.name', '=', $user)
            ->limit(3)
            ->get();
        return view('dashboard', compact('appointments','doctors'));
    })->name('dashboard');
});

Route::controller(AdminController::class)->group(function () {
    
    Route::get('/admin', 'index')->name('admin.index');
    Route::get('/adminUsers', 'users')->name('admin.user.index');
    Route::get('/Users/{id}', 'usersEdit')->name('admin.user.edit'); // users show by id
    Route::put('/Users/{id}', 'update'); //users update 
    Route::post('/store', 'store')->name('admin.store'); // store appointment
    
    // admin functions 
    Route::get('/event-edit/{id}', 'requestEdit')->name('admin.edit-request');
    Route::put('/event-edit/{id}', 'requestUpdate'); //request update 
    // dashboard folder 
    Route::get('/adminDashboard', 'dashboard')->name('admin.dashboard.index');
    Route::post('/createUser', 'createUser');
    // Calendar 
    Route::get('/calendar', 'calendar')->name('calendar.index');
    // Route::post('/check-availability', function (Request $request) {
    //     $date = $request->input('date');
    //     $time = $request->input('time');

    //     DB::table('appointment')
    //         ->select('date')
    //         ->get();
    //     // Check the availability for the selected date and time
    //     // Your availability logic here

    //     // Assuming availability check passed
    //     $status = 'not available';

    //     return response()->json(['status' => $status]);
    // })->name('check-availability');
});

Route::controller(MailController::class)->group(function () {
    Route::get('/send-mail', 'index');
});