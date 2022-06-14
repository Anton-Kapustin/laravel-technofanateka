<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

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

Route::get('/', 'HomeController@index')->name('HomePage');
Route::get('/home', 'HomeController@index')->name('HomePage');

Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth')->name('logout');
Route::resource('User', 'UserController')->middleware('verified');
Auth::routes(['verify' => true]);

//----------------------------------------------------------------------------------------------------------------
// Verify mail page
Route::get('/email/verify', function () {
    return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

// Verify route user mail
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

// Verify mail send code
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:verify-email'])->name('verification.send');

// Verify mail resend code
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
//----------------------------------------------------------------------------------------------------------------
// reset passwords
// fogot password request
Route::get('/forgot-password', function () {
    return view('auth.passwords.forgot-password');
})->middleware('guest')->name('password.request');

// form POST request with email
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

// form for reset password
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

// form POST request with new password
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

// password update
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

//----------------------------------------------------------------------------------------------------------------
// change password
Route::group(['middleware' => 'auth'], function() {
    Route::get('/changePassword','Auth\ChangePasswordController@index')->name('password.change');
    Route::post('/changePassword','Auth\ChangePasswordController@store')->name('password.change.store');
});

//----------------------------------------------------------------------------------------------------------------

Route::get('/accessories', 'Accessory\CpuController@index')->name('Cpu.index')->middleware('verified');
Route::resource('Cpu', 'Accessory\CpuController')->middleware('verified');
Route::resource('Cooller', 'Accessory\CoollerController')->middleware('verified');
Route::resource('Hdd', 'Accessory\HddController')->middleware('verified');
Route::resource('Motherboard', 'Accessory\MotherboardController')->middleware('verified');
Route::resource('PcCase', 'Accessory\PcCaseController')->middleware('verified');
Route::resource('PowerSupply', 'Accessory\PowerSupplyController')->middleware('verified');
Route::resource('Ram', 'Accessory\RamController')->middleware('verified');
Route::resource('Ssd', 'Accessory\SsdController')->middleware('verified');
Route::resource('VideoCard', 'Accessory\VideoCardController')->middleware('verified');

Route::resource('Assemble', 'AssembleController')->except(['index'])->middleware('verified');
Route::get('/Assemble', 'AssembleController@index')->name('Assemble.index');
Route::get('/assemble_admin', 'AssembleController@indexAdmin')->name('assembleAdmin')->middleware('verified');

Route::resource('News', 'NewsController')->except(['index', 'show'])->middleware('verified');
Route::get('/News', 'NewsController@index')->name('News.index');
Route::get('/News/{News}', 'NewsController@show')->name('News.show');
Route::get('/news_admin', 'NewsController@indexAdmin')->name('newsAdmin')->middleware('verified');
Route::get('/publish_news/{id}', 'NewsController@publishNews')->name('admin_publish_news');
Route::get('/archive_news/{id}', 'NewsController@archiveNews')->name('admin_archive_news');
Route::get('/top_news/{id}', 'NewsController@addToTopNews')->name('add_to_top_news');
Route::get('/delete_from_top_news/{id}', 'NewsController@deleteFromTopNews')->name('delete_from_top_news');

Route::get('/contacts', 'ContactsController@show_contacts_page')->name('ContactsPage');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::post('/vkapi/notify', 'VKController@push_message_from_vk')->name('vk_push_message');

// Route::get('/admin/settings', 'AdminPanelController@show_settings_page')->name('admin_settings');
// Route::get('/admin/tlg', 'AdminPanelController@show_telegram_status')->name('admin_telegram_status');

// Route::get('/telegram/test', 'TelegramController@test')->name('telegram_test');
// Route::get('/telegram/get_webhook_info', 'TelegramController@getWebhookInfo')->name('telegram_get_webhook_info');
// Route::get('/telegram/remove_webhook', 'TelegramController@removeWebhook')->name('telegram_remove_webhook');
// Route::get('/telegram/set_webhook', 'TelegramController@setWebhook')->name('telegram_set_webhook');

// Route::post('/1279013012:AAEmmBma3EygqDSb1YrN2uxvbnUe1Ak48eE/webhook', 'TelegramController@push_message_from_telegram')->name('telegram_push_message');
// Route::post('/telegram/test_webhook', 'TelegramController@push_message_from_telegram')->name('telegram_push_message_test');




