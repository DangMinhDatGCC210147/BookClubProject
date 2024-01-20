<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberEventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\TotalFundsController;
use App\Http\Controllers\UserController;
use App\Models\Attendance;
use App\Models\Member;
use App\Mail\HelloMail;
use App\Models\MemberEvent;
use Illuminate\Support\Facades\Mail;

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
Route::fallback(function () {
    return view('errors.404');
});

// ========================LOGIN AND REGISTER===========================

Route::get('/', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// ========================USERS===========================


Route::get('/homepage', [IndexController::class, 'index'])->name('user.index');
Route::get('/event', [IndexController::class, 'event'])->name('user.event');
Route::get('/event/{id}', [EventController::class, 'eventDetail'])->name('user.event-detail');

// ========================LEADERS===========================
Route::get('/leader', [IndexController::class, 'indexleader'])->name('leaders.index');

// Route::get('logout', [UserController::class, 'logout'])->name('logout');
// ========================MEMBERS===========================


Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/{member}/edit', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/members/{member}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/{member}', [MemberController::class, 'destroy'])->name('members.destroy');
// Statistic
Route::get('/get-chart-data2', [MemberController::class, 'getChartData'])->name('get.chart.data');
Route::get('/get-birthday-stats', [MemberController::class, 'getBirthdayStats'])->name('get.birthday.stats');

Route::get('/api/members/{idSt}', [MemberController::class, 'getMemberByIdSt']);
Route::get('/check-idSt-exists/{idSt}', [MemberController::class, 'checkIdStExists']);
// ========================EVENTS===========================


Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/list', [EventController::class, 'eventList'])->name('events.list');
Route::get('/events/id/{eventId}', [EventController::class, 'eventList']);
Route::patch('/events/{event}/update-comments', [EventController::class, 'updateComments'])->name('events.updateComments');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');


// ========================REGISTER EVENTS===========================
Route::delete('/event/registerid/{eventRegister}', [MemberEventController::class, 'eventRegisterDestroy'])->name('event.registerDestroy');
Route::post('/events/register/{event}', [EventController::class, 'register'])->name('events.register');
Route::post('/events/register/{event}', [EventController::class, 'registerOneEvent'])->name('one.event.register');
Route::post('/events/cannot-join/{event}', [EventController::class, 'cannotJoinEvent'])->name('one.event.cannot-join');
Route::get('/registration/edit/{id}', [EventController::class, 'editRegistration'])->name('registration.edit');
Route::post('/update-list-register/{id}', [EventController::class, 'updateListRegister'])->name('update.list.register');

// ========================ATTENDANCES===========================
Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
Route::post('/attendances', [AttendanceController::class, 'store'])->name('attendances.store');
Route::get('/attendances/{attendance}/edit', [AttendanceController::class, 'edit'])->name('attendances.edit');
Route::put('/attendances/{attendance}', [AttendanceController::class, 'update'])->name('attendances.update');
Route::delete('/attendances/{attendance}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');

// ========================FUNDS===========================
Route::get('/funds', [FundController::class, 'index'])->name('funds.index');
Route::post('/funds', [FundController::class, 'create']);
Route::post('/funds', [FundController::class, 'store'])->name('funds.store');
Route::get('/funds/{id}', [FundController::class, 'show']);
Route::get('/funds/{id}/edit', [FundController::class, 'edit']);
Route::put('/funds/{id}', [FundController::class, 'update']);
Route::delete('/funds/{id}', [FundController::class, 'destroy']);

Route::post('/update-fund', [FundController::class, 'updateFund'])->name('update-fund');
//Funds user
Route::get('/funds/index', [FundController::class, 'show'])->name('funds.user.index');
Route::post('/checkout', [FundController::class, 'checkout'])->name('funds.checkout');

// ========================TOTALFUNDS===========================


Route::post('/total-funds/store', [TotalFundsController::class, 'store'])->name('total-funds.store');
Route::put('/total-funds/update/{id}', [TotalFundsController::class, 'update']);
Route::get('/total-funds', [TotalFundsController::class, 'index'])->name('total-funds.index');
Route::get('/total-funds/create', [TotalFundsController::class, 'create'])->name('total-funds.create');
Route::get('/get-chart-data', [TotalFundsController::class, 'getChartData']);

// ========================MAIL===========================
// Route::get('/', function () {
//     Mail::to('datdmgcc210147@fpt.edu.vn')
//         ->send(new HelloMail());
// });


// ========================PAYMENTS===========================
Route::get('/submit-paying', [PaymentController::class, 'index'])->name('submit-paying.index');
Route::delete('/submit-paying/{id}', [PaymentController::class, 'destroy'])->name('submit-paying.destroy');