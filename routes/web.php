<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MenulistController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Middleware\Authenticate;
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
Route::get('/',function(){
    return view('welcome');
});

Route::match(['get', 'post'], '/upload',[App\Http\Controllers\UploadController::class,'upload']);

Route::prefix('admin')->name('admin.')->middleware(Authenticate::class)->group(function () {
    //后台首页
    Route::get('/index',[IndexController::class,'index']);
    //后台登录
    Route::prefix('Login')->group(function () {

        Route::get('index',[LoginController::class,'index'])->name('login.index')->withoutMiddleware(Authenticate::class);

        Route::post('dologin',[LoginController::class,'dologin'])->name('login.dologin')->withoutMiddleware(Authenticate::class);
        //退出登录
        Route::get('logout', [LoginController::class,'logout'])->name('login.logout')->withoutMiddleware(Authenticate::class);

    });

    //后台菜单列表
    Route::prefix('Menulist')->group(function () {

        Route::get('index', [MenulistController::class,'index'])->name('menulist.index');
        //添加
        Route::match(['get', 'post'], 'add/{pid?}',[MenulistController::class,'add'])->name('menulist.add');
        //编辑
        Route::match(['get', 'post'], 'edit/{ids?}',[MenulistController::class,'edit'])->name('menulist.edit');

    });

    //后台管理员管理
    Route::prefix('Manager')->group(function(){

        Route::match(['get', 'post'], 'index', [ManagerController::class,'index'])->name('Manager.index');
        //添加
        Route::match(['get', 'post'], 'add', [ManagerController::class,'add'])->name('Manager.add');
        //修改
        Route::match(['get', 'post'], 'edit/{id?}', [ManagerController::class,'edit'])->name('Manager.edit');

    });

    //后台角色管理
    Route::prefix('Role')->group(function(){

        Route::get('index',[RoleController::class,'index'])->name('Role.index');
        //添加
        Route::match(['get', 'post'], 'add', [RoleController::class,'add'])->name('Role.add');
        //修改
        Route::match(['get', 'post'], 'edit', [RoleController::class,'edit'])->name('Role.edit');
        
    });

    Route::get('welcome',function(){

        return view('admin.index.welcome');

    });
    
});

Route::prefix('index')->name('index.')->group(function(){
    //前台
    Route::get('index', function () {
        return view('index/index');
    });
});

// Route::redirect('abc', 'https://www.baidu.com', 301);