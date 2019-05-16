<?php

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

Auth::routes();

Route::group(['middleware' => ['guest']], function () {
    Route::post('/register/wallet', 'FrontController@register')->name('wallet.register');
});
Route::group(['middleware' => ['guest']], function () {
    Route::get('/register/{reference}', 'FrontController@referRegister');
});
Route::get('/', function () {
    return view('front.index');
});
Route::get('/404', function () {
    return view('404');
})->name('404');

//Cron
Route::get('/cron', 'FrontController@Cron');
Route::get('/', 'FrontController@index');


//Authorization
Route::get('/authorization', 'FrontController@authorization')->name('authorization');
Route::post('/sendemailver', 'FrontController@sendemailver')->name('sendemailver');
Route::post('/emailverify', 'FrontController@emailverify')->name('emailverify');
Route::post('/sendsmsver', 'FrontController@sendsmsver')->name('sendsmsver');
Route::post('/smsverify', 'FrontController@smsverify')->name('smsverify');
Route::post('/home/g2fa/verify', 'FrontController@verify2fa')->name('go2fa.verify');

//Forgot Password
Route::post('/forgot-pass', 'FrontController@forgotPass')->name('forgot.pass');
Route::get('/reset/{token}', 'FrontController@resetLink')->name('reset.passlink');
Route::post('/reset/password', 'FrontController@passwordReset')->name('reset.passw');



Route::group(['middleware' => ['auth']], function() {
Route::group(['prefix' => 'home'], function () {

Route::get('/', 'HomeController@index')->name('home');

//Change Password
Route::get('/change/password', 'HomeController@changepass')->name('changepass');
Route::post('/change/passw', 'HomeController@chnpass')->name('changep');

//Google-Auth
Route::get('/g2fa', 'HomeController@google2fa')->name('go2fa');
Route::post('/g2fa/create', 'HomeController@create2fa')->name('go2fa.create');
Route::post('/g2fa/disable', 'HomeController@disable2fa')->name('disable.2fa');

//Deposit
Route::get('/deposit', 'HomeController@deposit')->name('deposit');
Route::get('/deposit-log', 'HomeController@depositLog')->name('depositlog');
Route::post('/deposit/preview', 'PaymentController@depconfirm')->name('deposit.confirm');
Route::post('/ipncoin', 'PaymentController@ipncoin')->name('ipn.coinPay');


//Investment
Route::get('/lending', 'InvestmentController@investcoin')->name('invest.coin');
Route::post('/lend/preview', 'InvestmentController@investview')->name('invest.preview');
Route::post('/lend/now', 'InvestmentController@investconfirm')->name('invest.now');
Route::get('/mylendings', 'InvestmentController@myInvest')->name('my.invest');
Route::get('/returnlog', 'InvestmentController@returnlog')->name('returnlog');

Route::get('/refered', 'HomeController@refered')->name('refered');

//Withdraw
Route::get('/withdraw', 'HomeController@withdraw')->name('user.withdraw');
Route::get('/withdraw-log', 'HomeController@withdrawLog')->name('withdrawlog');
Route::post('/withdraw/confirm','HomeController@wdconfirm')->name('wdconfirm');

//Transactions
Route::get('/transactions', 'HomeController@transLog')->name('my.transactions');


});
});




Route::group(['prefix' => 'admin'], function () {

  // General Settings
  Route::get('/general', 'GeneralController@index')->name('general');
  Route::post('/general/update', 'GeneralController@update')->name('general.update');
  Route::get('/logo', 'GeneralController@logo')->name('logo');
  Route::post('/logo/update', 'GeneralController@logoupdate')->name('logo.update');
  Route::get('/change-password', 'GeneralController@changepass')->name('change.password');
  Route::post('/password/update', 'GeneralController@updatepass')->name('password.update');

  //Slider
  Route::get('/slide', 'SliderController@index')->name('slide');
  Route::post('/slider', 'SliderController@store')->name('slider.store');
  Route::put('/slider/{slider}', 'SliderController@update')->name('slider.update');
  Route::get('/slider/{slider}/delete', 'SliderController@destroy')->name('slider.destroy');

  //Services
  Route::get('/services', 'ServiceController@index')->name('service');
  Route::post('/service', 'ServiceController@store')->name('service.store');
  Route::put('/service/{service}', 'ServiceController@update')->name('service.update');
  Route::get('/service/{service}/delete', 'ServiceController@destroy')->name('service.destroy');

//Stats
Route::get('/stats', 'StatController@index')->name('stat');
Route::post('/stat', 'StatController@store')->name('stat.store');
Route::put('/stat/{stat}', 'StatController@update')->name('stat.update');
Route::get('/stat/{stat}/delete', 'StatController@destroy')->name('stat.destroy');

//Testimonial
Route::get('/testim', 'TestmController@index')->name('testim');
Route::post('/testim', 'TestmController@store')->name('testim.store');
Route::put('/testim/{testim}', 'TestmController@update')->name('testim.update');
Route::get('/testim/{testim}/delete', 'TestmController@destroy')->name('testim.destroy');

//Payment Method
Route::get('/paymethod', 'PaymController@index')->name('paymethod');
Route::post('/payme', 'PaymController@store')->name('paymethod.store');
Route::get('/paymethod/{paymethod}/delete', 'PaymController@destroy')->name('paymethod.destroy');

//Interface
Route::get('/interface', 'InterfaceController@index')->name('interface');
Route::post('/interface/update', 'InterfaceController@update')->name('interface.update');

  //Email Template
  Route::get('/template', 'EtemplateController@index')->name('template');
  Route::post('/template/update', 'EtemplateController@update')->name('template.update');

  //Gateway
  Route::get('/gateway', 'GatewayController@show');
  Route::put('/gateway/{gateway}', 'GatewayController@update');

  //Package
  Route::get('/package', 'PackageController@index')->name('package');
  Route::post('/package/update', 'PackageController@update')->name('package.update');

  //User Management
  Route::get('/users', 'UserlogController@index')->name('users');
  Route::post('/user/search', 'UserlogController@userSearch')->name('search.users');
  Route::get('/user/{user}', 'UserlogController@single')->name('user.single');
  Route::get('/user-banned', 'UserlogController@banusers')->name('user.ban');

  Route::get('/mail/{user}', 'UserlogController@email')->name('email');
  Route::post('/sendmail', 'UserlogController@sendemail')->name('send.email');
  Route::put('/user/balance/{user}', 'UserlogController@blupdate')->name('user.balance');
  Route::put('/user/status/{user}', 'UserlogController@statupdate')->name('user.status');
  Route::get('/broadcast', 'UserlogController@broadcast')->name('broadcast');
  Route::post('/broadcast/email', 'UserlogController@broadcastemail')->name('broadcast.email');

//Investment
Route::get('/lendings', 'UserlogController@lendings')->name('user.lendings');


//Deposit
Route::get('/deposits', 'DepositController@index')->name('deposits');
Route::get('/deposits/requests', 'DepositController@requests')->name('deposits.requests');
Route::put('/deposit/approve/{id}', 'DepositController@approve')->name('deposit.approve');
Route::get('/deposit/{deposit}/delete', 'DepositController@destroy')->name('deposit.destroy');

//Deposit
Route::get('/withdraw', 'WithdrawController@index')->name('withdraw');
Route::get('/withdraw/requests', 'WithdrawController@requests')->name('withdraw.requests');
Route::put('/withdraw/approve/{id}', 'WithdrawController@approve')->name('withdraw.approve');
Route::get('/withdraw/{withdraw}/delete', 'WithdrawController@destroy')->name('withdraw.destroy');

  Route::get('/user-translog', 'UserlogController@transLog')->name('users.transactions');


  //Admin Auth
  Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

});

