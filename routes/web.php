<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{

    Site\SiteController,

    /* DASHBOARD
    ================================================== */
    Dashboard\DashboardController,

    /* REGISTER
    ================================================== */
    Register\Plan\PlanController, ## PLAN
    Register\DetailPlan\DetailPlanController, ## DETAIL PLAN

    Register\Category\CategoryController, ## CATEGORY

};

/* SITE
================================================== */
Route::get( '', [ SiteController::class, 'index' ] )->name( 'site.home' ); ## HOME
Route::get( '/plan/{url}', [ SiteController::class, 'plan' ] )->name( 'plan.subscription' ); ## PLAN

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

    Route::resource( 'register/category', CategoryController::class ); ## CATEGORY
    Route::any( 'register/category/search', [ CategoryController::class, 'search' ] )->name( 'category.search' ); ## CATEGORY SEARCH

});
