<?php
use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
//create a new event
$event = new Event;

$event->name = 'A new event';
$event->reason = 'Event description';
$event->date = Carbon\Carbon::now();
$event->time_start = Carbon\Carbon::now()->addHour();
$event->time_end = Carbon\Carbon::now()->addHour();
$event->save();
$e = Event::get();
dd($e);
    //  return view('welcome');
});

Route::get('dashboard', function () {
    $events = DB::select('select * from events where active = ?');
    return view('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::User()->name;
        $events = DB::table('events')
            ->join('users', 'events.name', '=', 'users.name')
            ->select('users.*', 'events.*')
            ->where('events.name', '=', $user)
            ->limit(3)
            ->get();
        return view('dashboard',compact('events'));
    })->name('dashboard');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index')->name('admin.index');
    Route::get('/adminUsers', 'users')->name('admin.user.index');
    Route::get('/Users/{id}', 'usersEdit')->name('admin.user.edit'); // users show by id
    Route::put('/Users/{id}', 'update'); //users update 
    Route::post('/store', 'store')->name('admin.store');
    // admin functions 
    Route::get('/event-edit/{id}', 'requestEdit')->name('admin.edit-request');
    Route::put('/event-edit/{id}', 'requestUpdate'); //request update 
    
});
