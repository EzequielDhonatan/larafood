<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\System\Panel\{

    Plan\PlanController

};

Route::get('/', function () {
    return view('welcome');
});

Route::group( [ 'auth:sanctum', 'verified' ], function () {

    Route::resource( 'system/panel/plan', PlanController::class );

    // Route::get( 'dashboard' )->name( 'dashboard' );

});

// Route::middleware( [ 'auth:sanctum', 'verified' ] )->get( '/dashboard', function () {
//     return view('dashboard');
// })->name( 'dashboard' );
