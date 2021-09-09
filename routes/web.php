<?php
use App\Hatsuwa;
use Illuminate\Http\Request;


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
 
/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
Route::get('/', function () { return redirect('/home'); });
 
/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    // Route::get('/home', 'HomeController@index')->name('home');
    //投稿のダッシュボード表示(hatsuwas.blade.php)
    Route::get('/', 'HatsuwasController@index');
    // 投稿画面へ移動
    Route::get('/aaa', function () {
      return view('aaa');
    });
    // 詳細画面へ移動
    Route::get('/detail/{id}','HatsuwasController@indexdetail');
    
    Route::get('/hatsuwastheme', 'HatsuwasController@indextheme');
    
    Route::get('/themelist/{id}', 'HatsuwasController@indexthemelist');
    //userprofilでの表示
    Route::get('/userprofile','HatsuwasController@indexuser' );
    //新「投稿」を追加 
    Route::post('/aaa', 'HatsuwasController@store')->name('hatsuwas');
    // タグ付き投稿
    Route::post('/submitfilewiththeme', 'HatsuwasController@withthemestore')->name('hatsuwas');
    //更新画面
    Route::post('/hatsuwasedit/{hatsuwas}',	'HatsuwasController@edit');
    Route::post('/hatsuwas/update', 'HatsuwasController@update');
    //投稿を削除 
    Route::delete('/hatsuwa/{hatsuwa}', 'HatsuwasController@destroy');
});
 
/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
    
});
 
/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});




// 管理者画面からテーマ投稿画面へ移動
Route::get('/admin/adminthemepost', function () {
  return view('/admin/adminthemepost');
});

// 管理者側からタグテーブルへ投稿
Route::post('/admin/adminthemepost', 'Admin\HomeController@themestore')->name('hatsuwas');












Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
