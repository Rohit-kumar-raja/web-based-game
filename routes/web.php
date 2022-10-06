<?php
use App\Http\Controllers\AllUsersController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\ContestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\WalletController;

// end Dashboard
Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// slider start
Route::get('slider', [SliderController::class, 'index'])->middleware('auth')->name('slider');
Route::post('slider', [SliderController::class, 'store'])->middleware('auth')->name('slider.insert');
Route::get('slider/delete/{id}', [SliderController::class, 'destroy'])->middleware('auth')->name('slider.delete');
Route::get('slider/status/{id}', [SliderController::class, 'status'])->middleware('auth')->name('slider.status');
Route::get('slider/update/{id}', [SliderController::class, 'edit'])->middleware('auth')->name('slider.edit');
Route::post('slider/update', [SliderController::class, 'update'])->middleware('auth')->name('slider.update');
// slider end

// site info start
Route::get('siteinfo', [SiteInfoController::class, 'index'])->middleware('auth')->name('siteinfo');
Route::post('siteinfo/update', [SiteInfoController::class, 'update'])->middleware('auth')->name('siteinfo.update');
// site info end

// allusers start
Route::get('allusers', [AllUsersController::class, 'index'])->middleware('auth')->name('allusers');
Route::post('allusers', [AllUsersController::class, 'store'])->middleware('auth')->name('allusers.insert');
Route::get('allusers/delete/{id}', [AllUsersController::class, 'destroy'])->middleware('auth')->name('allusers.delete');
Route::get('allusers/status/{id}', [AllUsersController::class, 'status'])->middleware('auth')->name('allusers.status');
Route::get('allusers/update/{id}', [AllUsersController::class, 'edit'])->middleware('auth')->name('allusers.edit');
Route::post('allusers/update', [AllUsersController::class, 'update'])->middleware('auth')->name('allusers.update');
// allusers end



// contactus start
Route::get('contactus', [ContactusController::class, 'index'])->middleware('auth')->name('contactus');
Route::post('contactus', [ContactusController::class, 'store'])->middleware('auth')->name('contactus.insert');
Route::get('contactus/delete/{id}', [ContactusController::class, 'destroy'])->middleware('auth')->name('contactus.delete');
Route::get('contactus/status/{id}', [ContactusController::class, 'status'])->middleware('auth')->name('contactus.status');
Route::get('contactus/update/{id}', [ContactusController::class, 'edit'])->middleware('auth')->name('contactus.edit');
Route::post('contactus/update', [ContactusController::class, 'update'])->middleware('auth')->name('contactus.update');
// contactus end


// wallet start
Route::get('wallet', [WalletController::class, 'index'])->middleware('auth')->name('wallet');
Route::post('wallet', [WalletController::class, 'store'])->middleware('auth')->name('wallet.insert');
Route::get('wallet/delete/{id}', [WalletController::class, 'destroy'])->middleware('auth')->name('wallet.delete');
Route::get('wallet/status/{id}', [WalletController::class, 'status'])->middleware('auth')->name('wallet.status');
Route::get('wallet/update/{id}', [WalletController::class, 'edit'])->middleware('auth')->name('wallet.edit');
Route::post('wallet/update', [WalletController::class, 'update'])->middleware('auth')->name('wallet.update');
// wallet end

// match start
Route::get('match', [MatchesController::class, 'index'])->middleware('auth')->name('match');
Route::post('match', [MatchesController::class, 'store'])->middleware('auth')->name('match.insert');
Route::get('match/delete/{id}', [MatchesController::class, 'destroy'])->middleware('auth')->name('match.delete');
Route::get('match/status/{id}', [MatchesController::class, 'status'])->middleware('auth')->name('match.status');
Route::get('match/update/{id}', [MatchesController::class, 'edit'])->middleware('auth')->name('match.edit');
Route::post('match/update', [MatchesController::class, 'update'])->middleware('auth')->name('match.update');
// match end

// contest start
Route::get('contest', [ContestController::class, 'index'])->middleware('auth')->name('contest');
Route::post('contest', [ContestController::class, 'store'])->middleware('auth')->name('contest.insert');
Route::get('contest/delete/{id}', [ContestController::class, 'destroy'])->middleware('auth')->name('contest.delete');
Route::get('contest/status/{id}', [ContestController::class, 'status'])->middleware('auth')->name('contest.status');
Route::get('contest/update/{id}', [ContestController::class, 'edit'])->middleware('auth')->name('contest.edit');
Route::post('contest/update', [ContestController::class, 'update'])->middleware('auth')->name('contest.update');
// contest end

require __DIR__ . '/auth.php';
