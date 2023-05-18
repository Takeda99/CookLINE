<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
Auth::routes();
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

#Route::get('/', function () {
#    return view('welcome');
#});

//メインメニュー
Route::get('/', [UsersController::class, 'index'])->name('index');
Route::get('/index', [UsersController::class, 'index'])->name('index');
//一般ログイン
Route::get('/login1', [UsersController::class, 'login1'])->name('login1');
//管理者ログイン
Route::get('/login2', [UsersController::class, 'login2'])->name('login2');
//一般topに戻る
Route::get('/top0', [UsersController::class, 'top0'])->name('top0')->middleware('check_admin');
Route::get('/top0', function () {
    return view('top0');
})->middleware('check_admin');
//新規アカウント作成(一般)
Route::get('/new1', [UsersController::class, 'new1'])->name('new1');
Route::post('/registerx', [UsersController::class, 'store']);
//新規アカウント作成(管理者)
Route::get('/new2', [UsersController::class, 'new2'])->name('new2');
Route::post('/register2', [UsersController::class, 'store2']);
//lineログイン
Route::get('/newline', [LoginController::class, 'redirectToLine']);
Route::get('/top1', [LoginController::class, 'handleLineCallback']);
//ログイン一般
Route::post('/login_main', [LoginController::class, 'authenticate'])->name('login_main');
//ログイン管理者
Route::post('/login2', [LoginController::class, 'authenticate2'])->name('login_sub');
//ログアウト
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//直接アクセスをログイン画面に返す
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//メニュー取得
Route::get('/top0', [UsersController::class, 'showRecipes'])->middleware('check_admin');
Route::get('/top_admin', [UsersController::class, 'admin'])->middleware('check_admin');
//メニュー削除
Route::delete('/recipes/delete/{recipe_id}', [UsersController::class, 'delete'])->name('delete_recipe')->middleware('check_admin');
//メニュー編集
Route::post('/recipes/edit/{recipe_id}', [UsersController::class, 'edit'])->name('recipe_edit')->middleware('check_admin');
Route::put('/recipes/update/{recipe_id}', [UsersController::class, 'update'])->name('recipe_update')->middleware('check_admin');
//メニューアップデート
Route::get('/recipe_update_complete', [UsersController::class, 'recipe_update_complete'])->name('recipe_update_complete')->middleware('check_admin');
Route::post('/recipe_complete', [UsersController::class, 'recipe_complete'])->name('recipe_complete')->middleware('check_admin');
//ログ取得
Route::get('/admin_log', [UsersController::class, 'admin_log'])->name('admin_log')->middleware('is_admin');
//userリスト取得
Route::get('/admin_list', [UsersController::class, 'admin_list'])->name('admin_list')->middleware('is_admin');
//adminトップ画面
Route::get('/top_admin', [UsersController::class, 'admin'])->name('top_admin')->middleware('is_admin');
//新たなレシピの追加
Route::get('/new_recipe', [UsersController::class, 'new_recipe'])->name('new_recipe')->middleware('check_admin');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
