<?php

use App\Http\Controllers\AllUsersController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\ContestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\ParticipatedUserController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\WithdrawRequestController;

// end Dashboard
Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// slider start
Route::get('/slider', [SliderController::class, 'index'])->middleware('auth')->name('slider');
Route::post('/slider', [SliderController::class, 'store'])->middleware('auth')->name('slider.insert');
Route::get('/slider/delete/{id}', [SliderController::class, 'destroy'])->middleware('auth')->name('slider.delete');
Route::get('/slider/status/{id}', [SliderController::class, 'status'])->middleware('auth')->name('slider.status');
Route::get('/slider/update/{id}', [SliderController::class, 'edit'])->middleware('auth')->name('slider.edit');
Route::post('/slider/update', [SliderController::class, 'update'])->middleware('auth')->name('slider.update');
// slider end

// site info start
Route::get('/siteinfo', [SiteInfoController::class, 'index'])->middleware('auth')->name('siteinfo');
Route::post('/siteinfo/update', [SiteInfoController::class, 'update'])->middleware('auth')->name('siteinfo.update');
// site info end

// allusers start
Route::get('/allusers/', [AllUsersController::class, 'index'])->middleware('auth')->name('allusers');
Route::get('/oneuser/{id}', [AllUsersController::class, 'oneuser'])->middleware('auth')->name('one.user');
Route::get('/allusers/delete/{id}', [AllUsersController::class, 'destroy'])->middleware('auth')->name('allusers.delete');
Route::get('/allusers/status/{id}', [AllUsersController::class, 'status'])->middleware('auth')->name('allusers.status');
Route::get('/allusers/document/status/{id}', [AllUsersController::class, 'document_status'])->middleware('auth')->name('allusers.document.status');

// allusers end



// contactus start
Route::get('/contactus', [ContactusController::class, 'index'])->middleware('auth')->name('contactus');
Route::get('/contactus/delete/{id}', [ContactusController::class, 'destroy'])->middleware('auth')->name('contactus.delete');
Route::get('/contactus/status/{id}', [ContactusController::class, 'status'])->middleware('auth')->name('contactus.status');
// contactus end


// wallet start
Route::get('/wallet', [WalletController::class, 'index'])->middleware('auth')->name('wallet');
Route::get('/wallet/delete/{id}', [WalletController::class, 'destroy'])->middleware('auth')->name('wallet.delete');
Route::get('/wallet/status/{id}', [WalletController::class, 'status'])->middleware('auth')->name('wallet.status');
Route::get('/wallet/debit', [WalletController::class, 'debit'])->middleware('auth')->name('wallet.debit');
Route::get('/wallet/credit', [WalletController::class, 'credit'])->middleware('auth')->name('wallet.credit');


// wallet end

// match start
Route::get('/matches', [MatchesController::class, 'index'])->middleware('auth')->name('matches');
Route::post('/matches', [MatchesController::class, 'store'])->middleware('auth')->name('matches.insert');
Route::get('/matches/delete/{id}', [MatchesController::class, 'destroy'])->middleware('auth')->name('matches.delete');
Route::get('/matches/status/{id}', [MatchesController::class, 'status'])->middleware('auth')->name('matches.status');
Route::get('/matches/update/{id}', [MatchesController::class, 'edit'])->middleware('auth')->name('matches.edit');
Route::post('/matches/update', [MatchesController::class, 'update'])->middleware('auth')->name('matches.update');
Route::post('/matches/api/', [MatchesController::class, 'fetch_api'])->middleware('auth')->name('matches.fatch.api');

// match end

// contest start
Route::get('/contest', [ContestController::class, 'index'])->middleware('auth')->name('contest');
Route::post('/contest', [ContestController::class, 'store'])->middleware('auth')->name('contest.insert');
Route::get('/contest/delete/{id}', [ContestController::class, 'destroy'])->middleware('auth')->name('contest.delete');
Route::get('/contest/status/{id}', [ContestController::class, 'status'])->middleware('auth')->name('contest.status');
Route::get('/contest/update/{id}', [ContestController::class, 'edit'])->middleware('auth')->name('contest.edit');
Route::post('/contest/update', [ContestController::class, 'update'])->middleware('auth')->name('contest.update');
Route::get('/contest/insert', [ContestController::class, 'insert'])->middleware('auth')->name('contest.insert.view');

// contest end

// withdraw request start
Route::get('/withdraw/request', [WithdrawRequestController::class, 'index'])->middleware('auth')->name('withdraw.request');
Route::get('/withdraw/delete/{id}', [WithdrawRequestController::class, 'destroy'])->middleware('auth')->name('withdraw_request.delete');
Route::get('/withdraw/status/{id}', [WithdrawRequestController::class, 'status'])->middleware('auth')->name('withdraw_request.status');

// withdraw request end

Route::get('/participate/user', [ParticipatedUserController::class, 'index'])->middleware('auth')->name('participate.user');
Route::get('/participate/user/delete/{id}', [ParticipatedUserController::class, 'destroy'])->middleware('auth')->name('participated_user.delete');
Route::get('/participate/user/status/{id}', [ParticipatedUserController::class, 'status'])->middleware('auth')->name('participated_user.status');

Route::get('/onematch/{id}', [ParticipatedUserController::class, 'onematch'])->middleware('auth')->name('one.match');
Route::get('/onecontest/{id}', [ParticipatedUserController::class, 'onecontest'])->middleware('auth')->name('one.contest');
Route::get('/onewallet/{id}', [ParticipatedUserController::class, 'onewallet'])->middleware('auth')->name('one.wallet');


require __DIR__ . '/auth.php';
