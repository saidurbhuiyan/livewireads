<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OfferWallController;
use App\Http\Controllers\Admin\ShortLinkController;
use App\Http\Controllers\User\CampaignController;
use App\Http\Controllers\User\Publisher\DashboardController as PublisherDashboardController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\Publisher\AppController;
use App\Http\Controllers\User\Publisher\WebsiteController;
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

Route::get('/', static function () {
    return redirect()->route('dashboard');
})->name('home');

/*
 * user
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    /*
     * user
     */
    Route::prefix('user')->group(function (){

            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::prefix('campaigns')->group(function () {
                Route::get('/', [CampaignController::class, 'show'])->name('campaigns');
                Route::get('/edit/{id}', [CampaignController::class,'edit'])->name('campaigns.edit');
            });


        /*
        * user publisher
        */

        Route::middleware(['role:publisher'])->prefix('publisher')->group(function () {

            Route::get('/dashboard',[PublisherDashboardController::class, 'index'])->name('publisher.dashboard');

            Route::prefix('websites')->group(function () {
                Route::get('/', [WebsiteController::class,'show'])->name('websites');

            });

            Route::prefix('apps')->group(function () {
                Route::get('/', [AppController::class,'show'])->name('apps');
                Route::get('/create', [AppController::class,'create'])->name('apps.create');
                Route::get('/edit/{id}', [AppController::class,'edit'])->name('apps.edit');

            });

        });
    });


    /*
    * admin
    */
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::prefix('shortlinks')->group(function () {
            Route::get('/', [ShortLinkController::class, 'show'])->name('shortlinks.show');
            Route::get('/create', [ShortLinkController::class, 'create'])->name('shortlinks.create');
            Route::get('/edit/{id}', [ShortLinkController::class, 'edit'])->name('shortlinks.edit');


        });
        Route::prefix('offerwalls')->group(function () {
            Route::get('/', [OfferWallController::class, 'show'])->name('offerwalls.show');
            Route::get('/create', [OfferWallController::class, 'create'])->name('offerwalls.create');
            Route::get('/edit/{id}', [OfferWallController::class, 'edit'])->name('offerwalls.edit');


        });
    });

});







