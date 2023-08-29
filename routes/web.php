<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SheduledClassController;
use App\Models\ScheduleClass;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Route;

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

/***Profile management */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
/********************************************** */

/**resource controller for the instructor
 * to schedule it  by CRUD
 */
Route::resource('/instructor/schedule', SheduledClassController::class)
    ->only(['index', 'create', 'store', 'destroy'])->middleware(['auth', 'role:instructor']);


Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');
/********************************************** */

/***Booking controller for the member in the gym to book appointment
 *
 */

/***Grouping function for members */
Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/member/dashboard', function () {
        return view('member.dashboard');
    })->name('member.dashboard');
    Route::get('/member/book', [BookingsController::class, 'create'])->name('booking.create');
    Route::Post('/member/bookings', [BookingsController::class, 'store'])->name('booking.store');
    Route::get('/member/bookings', [BookingsController::class, 'index'])->name('booking.index');
    Route::delete('/member/bookings/{id}', [BookingsController::class, 'destroy'])->name('booking.destroy');


});

/***Dashboard controller for [member,instructor,admin] */
Route::get('/instructor/dashboard', function () {
    return view('instructor.dashboard');
})->middleware(['auth', 'role:instructor'])->name('instructor.dashboard');



Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');
/********************************************** */


require __DIR__ . '/auth.php';
