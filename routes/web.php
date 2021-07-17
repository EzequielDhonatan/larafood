<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\System\Panel\{

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
    Route::get( '', [ DashboardController::class, 'index' ] )->name( 'dashboard' );

    /* REGISTER
    ================================================== */
    Route::resource( 'system/panel/register/plan', PlanController::class ); ## PLAN
    Route::any( 'system/panel/register/plan/search', [ PlanController::class, 'search' ] )->name( 'plan.search' ); ## PLAN SEARCH
    Route::resource( 'system/panel/register/plan/{url}/detail-plan', DetailPlanController::class ); ## DETAIL PLAN

});
