<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{

    /* DASHBOARD
    ================================================== */
    Dashboard\DashboardController,

    /* REGISTER
    ================================================== */
    Register\Plan\PlanController, ## PLAN
    Register\DetailPlan\DetailPlanController, ## DETAIL PLAN

};

Route::group(
    [
        'middleware'    => 'auth:sanctum',
        'verified'
    ],

    function () {

    /* DASHBOARD
    ================================================== */
    Route::get( 'dashboard', [ DashboardController::class, 'index' ] )->name( 'dashboard' );

    /* REGISTER
    ================================================== */
    Route::resource( 'register/plan', PlanController::class ); ## PLAN
    Route::any( 'register/plan/search', [ PlanController::class, 'search' ] )->name( 'plan.search' ); ## PLAN SEARCH
    Route::resource( 'register/plan/{url}/detail-plan', DetailPlanController::class ); ## DETAIL PLAN

});
