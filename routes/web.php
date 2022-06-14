<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ { EselonController, FrontController, DashboardController };
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



Route::get('/password', function () {
    return \Hash::make("admin");
});

Route::get('login-api',function() {
  $api = new \App\Libraries\ApiSimpeg;
  $api->login();
  $resp = $api->get('api/pns/data-utama/198107092009041001');
  dd(json_decode($resp));
  
});
 
Route::get('/migrate', function(){
    \Artisan::call('make:migration create_tb_pegawai_table');
    dd('migrated!');
});


Route::get('/login',[FrontController::class,"loginIndex"])->name('login');
Route::post('/login',[FrontController::class,"doLogin"]);

Route::get('/logout',[FrontController::class,"doLogout"])->name('logout');

Route::middleware(['auth'])->group(function(){
    
  Route::get('/', function () {
    return view('welcome');
  });

  Route::get('dashboard',[DashboardController::class,"index"]);

  Route::prefix('master')->group(function(){
      Route::get('eselon',[EselonController::class,"index"]);
      Route::post('eselon/data',[EselonController::class,"data"]);
  });
});
