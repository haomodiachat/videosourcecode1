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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
 * Route cho Administrator
 * */
Route::prefix('admin')->group(function () {
    // gom nhóm các route cho phần admin

    //URL: authen.com/admin/
    //route mặc định của admin
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    //URL: authen.com/admin/dashboard
    //route đăng nhập thành công
    Route:: get('/dashboard', 'AdminController@index')->name('admin dashboard');
    /*URL: authen.com/admin/register
     *route trả về view để đăng ký tài khoản của admin
     * */
    Route::get('register', 'AdminController@create')->name('admin.register');
    /*URL: authen.com/admin/register
     * phương thức là Post, dùng để xử lý dữ liệu
     * Route dùng để đăng ký 1 admin từ form POST
     * */
    Route::post('register', 'AdminController@store')->name('admin.register.store');

    /*Route trả về view đăng nhập admin
     *URL: authen.com/admin/login
     *  */
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');
    /*
     * Route xử lý quá trình đăng nhập admin
     * URL: authen.com/admin/login
     * */
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin') -> name('admin.auth.loginAdmin');
    /*
     * Route dùng để đăng xuất
     * URL: authen.com/admin/logout
     * */
    Route::post('logout', 'Auth\Admin\LoginController@logout') -> name('admin.auth.logout');
});

