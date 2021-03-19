<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('index');

Route::get('/faq', [App\Http\Controllers\PageController::class, 'faq'])->name('faq');

Route::post('/saveComment', [App\Http\Controllers\PageController::class, 'createComment'])->name('createComment');


//Payment Methods

//Paypal
Route::get('/paypal/pay', [App\Http\Controllers\PaymentController::class, 'payWithPayPal'])->name('paypalpay');
Route::get('/paypal/status', [App\Http\Controllers\PaymentController::class, 'payPalStatus'])->name('paypalstatus');
Route::get('/results', [App\Http\Controllers\PaymentController::class, 'results'])->name('results');
//Stripe
Route::get('/stripe',[App\Http\Controllers\PaymentController::class, 'checkoutStripe'])->name('stripepay');
Route::post('/stripe',[App\Http\Controllers\PaymentController::class, 'afterPaymentStripe'])->name('checkout.credit-card');





Route::get('/test', [App\Http\Controllers\PageController::class, 'testeo'])->name('testeo')->middleware('auth');

Route::get('/asdasd', [App\Http\Controllers\HomeController::class, 'asd'])->name('homeee')->middleware('auth');