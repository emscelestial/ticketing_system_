<?php

use App\Http\Controllers\PassengerController;
use App\Http\Controllers\Admin\PassengersController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\booking;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', function () {
    return view('welcome');
});


Route::get('admin/passenger', [App\Http\Controllers\PassengerController::class, 'index'])->name('passenger');
Route::post('admin/passenger',[App\Http\Controllers\PassengerController::class, 'store'])->name('passenger');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function ()
{


    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin.dashboard');

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);

    Route::post('users/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'store']);
    Route::get('users/{user_id}/create', [App\Http\Controllers\Admin\UserController::class, 'create']);
    Route::put('update-user/{user_id}',[App\Http\Controllers\Admin\UserController::class, 'update']);

    Route::get('/passenger', [PassengerController::class, 'index'])->name('passenger.index');
    Route::get('/passenger/create', [PassengerController::class, 'create'])->name('passenger.create');
    Route::post('/passenger', [PassengerController::class, 'store'])->name('passenger.store');
    Route::get('/passenger/{id}/edit', [PassengerController::class, 'edit'])->name('passenger.edit');
    Route::put('/passenger/{id}', [PassengerController::class, 'update'])->name('passenger.update');
    Route::delete('/passenger/{id}', [PassengerController::class, 'destroy'])->name('passenger.destroy');

    Route::get('uploads/passenger/{filename}', function ($filename) {
        $path = public_path('uploads/passenger/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    })->name('passenger.image');








    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/{id}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::put('/schedule/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy'])->name('schedule.destroy');






});


Route::get('/booking', function() {
    return view('booking');
});

