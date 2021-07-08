<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\System\Panel\{

    Dashboard\DashboardController,

    /* REGISTER
    ================================================== */
    Register\Plan\PlanController

};

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    [
        'middleware'    => 'auth:sanctum',
        'verified'
    ],

    function () {

    Route::get( 'system/panel/dashboard', [ DashboardController::class, 'index' ] )->name( 'dashboard' );

    /* REGISTER
    ================================================== */
    Route::resource( 'system/panel/plan', PlanController::class );

});
