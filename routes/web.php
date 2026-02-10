<?php

use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiDocController;
use App\Http\Controllers\Onboarding\CompleteController;
use App\Http\Controllers\Onboarding\OrganizationController;
use App\Http\Controllers\Onboarding\PackageController;
use App\Http\Controllers\Onboarding\PreferenceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/dashboard/{property?}', [AdminController::class, 'index'])
        ->name('dashboard.index');

Route::middleware('auth')->group(function () {
        Route::get('/dashboard/{property?}', [AdminController::class, 'index'])
        ->name('dashboard.index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::view('/organization-inactive', 'onboarding.inactive')
    ->name('onboarding.inactive');

        Route::resource('users', UserController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/api-docs', [ApiDocController::class, 'index'])->name('api-docs.index');
    Route::get('/api-docs/create', [ApiDocController::class, 'create'])->name('api-docs.create');
    Route::post('/api-docs', [ApiDocController::class, 'store'])->name('api-docs.store');
    Route::get('/api-docs/{apiDoc}', [ApiDocController::class, 'show'])->name('api-docs.show');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
  Route::resource('packages', \App\Http\Controllers\Admin\PackageController::class)
    ->except(['show']);

});




/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'show'])
    ->name('privacy.show');


    Route::get('/web/privacy-policy', [PrivacyPolicyController::class, 'show_web'])
    ->name('privacy.show_web');
/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])
    ->prefix('admin/privacy')
    ->name('admin.privacy.')
    ->group(function () {

        Route::get('/', [PrivacyPolicyController::class, 'index'])->name('index');
        Route::get('/create', [PrivacyPolicyController::class, 'create'])->name('create');
        Route::post('/', [PrivacyPolicyController::class, 'store'])->name('store');
        Route::get('/{privacyPolicy}/edit', [PrivacyPolicyController::class, 'edit'])->name('edit');
        Route::put('/{privacyPolicy}', [PrivacyPolicyController::class, 'update'])->name('update');
        Route::delete('/{privacyPolicy}', [PrivacyPolicyController::class, 'destroy'])->name('destroy');
    });


Route::post('/dashboard/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('dashboard.logout');


Route::middleware(['auth'])->group(function () {

    Route::get('/setup/package', [PackageController::class, 'index'])
        ->name('setup.package');

            Route::get('/complete-setup', [OrganizationController::class, 'finish'])
        ->name('onboarding.setup.complete');

    Route::post('/setup/package', [PackageController::class, 'store'])
        ->name('setup.package.store');

});


Route::get('/integrations/api', function () {
    $organization = auth()->user()->organization;

    abort_if(!$organization, 403);

    return view('core.integrations.api', compact('organization'));
})
->middleware(['web', 'auth'])
->name('integrations.api');

    Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/backup', [\App\Http\Controllers\Admin\BackupController::class, 'index'])
        ->name('admin.backup.index');

    Route::post('/backup/run', [\App\Http\Controllers\Admin\BackupController::class, 'run'])
        ->name('admin.backup.run');
});



Route::get('/admin/security/login-attempts',
    [\App\Http\Controllers\Admin\LoginAttemptController::class, 'index']
)->middleware(['auth', 'role:admin'])
 ->name('admin.login-attempts');






Route::middleware(['auth','org.ready'])->group(function () {

    Route::get('/preferences', [PreferenceController::class, 'create'])
        ->name('setup.preferences');

    Route::post('/preferences', [PreferenceController::class, 'store'])
        ->name('setup.preferences.store');

});





Route::middleware(['auth','org.ready'])->group(function () {

    Route::get('/setup/complete', [CompleteController::class, 'index'])
        ->name('setup.complete');

});




Route::middleware(['auth'])->group(function () {
    Route::get('/setup/institution', [OrganizationController::class, 'create'])
        ->name('setup.institution');

    Route::post('/setup/institution', [OrganizationController::class, 'store'])
        ->name('setup.institution.store');
});


require __DIR__.'/auth.php';
