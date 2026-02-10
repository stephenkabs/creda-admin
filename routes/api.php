<?php

use App\Http\Controllers\Api\V1\BranchApiController;
use App\Http\Controllers\Api\V1\ClientApiController;
use App\Http\Controllers\Api\V1\ExpenseApiController;
use App\Http\Controllers\Api\V1\LoanApiController;
use App\Http\Controllers\Api\V1\MarketLoanApiController;
use App\Http\Controllers\Api\V1\OrganizationApiController;
use App\Http\Controllers\Api\V1\PaymentApiController;
use App\Http\Controllers\Api\V1\PaymentSummaryApiController;
use App\Http\Controllers\Api\V1\SalaryLoanApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;








/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| These routes are loaded by RouteServiceProvider
| and are automatically prefixed with /api
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| API v1 (Sanctum Protected)
|--------------------------------------------------------------------------
*/
Route::prefix('v1')
    ->middleware('auth:sanctum')
    ->group(function () {

        // 🔹 Loans API (Money-maker)
        Route::get('/loans', [LoanApiController::class, 'index']);
        Route::get('/loans/{loan}', [LoanApiController::class, 'show']);


        // ✅ Payments
        Route::get('/payments/summary', [PaymentSummaryApiController::class, 'index']);
        Route::get('/payments', [PaymentApiController::class, 'index']);
        Route::get('/payments/{payment}', [PaymentApiController::class, 'show']);

        Route::get('/clients', [ClientApiController::class, 'index']);
        Route::get('/clients/{client}', [ClientApiController::class, 'show']);

        Route::get('/branches', [BranchApiController::class, 'index']);
        Route::get('/branches/{branch}', [BranchApiController::class, 'show']);

        Route::get('/organization', [OrganizationApiController::class, 'show']);

        Route::get('/market-loans', [MarketLoanApiController::class, 'index']);
        Route::get('/market-loans/{marketLoan}', [MarketLoanApiController::class, 'show']);

                Route::get('/salary-loans', [SalaryLoanApiController::class, 'index']);
        Route::get('/salary-loans/{salaryLoan}', [SalaryLoanApiController::class, 'show']);
                Route::get('/expenses', [ExpenseApiController::class,'index']);
        Route::get('/expenses/{expense}', [ExpenseApiController::class,'show']);


    });
