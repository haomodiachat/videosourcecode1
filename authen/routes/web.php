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
    return view('frontend.homepages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
 * Route cho Administrator
 * */
Route::prefix('admin')->group(function () {
    // gom nhóm các route cho phần admin
    /*
     * ****************************************** Route admin authentication************************************
    */

    //URL: authen.com/admin/
    //route mặc định của admin
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    //URL: authen.com/admin/dashboard
    //route đăng nhập thành công
    Route:: get('/dashboard', 'AdminController@index')->name('admin.dashboard');
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

    /*
     * ****************************************** Route admin shopping category************************************
    */

    Route::get('shop/category','Admin\ShopCategoryController@index');
    Route::get('shop/category/create','Admin\ShopCategoryController@create');
    Route::get('shop/category/{id}/edit','Admin\ShopCategoryController@edit');
    Route::get('shop/category/{id}/delete','Admin\ShopCategoryController@delete');

    Route::post('shop/category', 'Admin\ShopCategoryController@store');
    Route::post('shop/category/{id}','Admin\ShopCategoryController@update');
    Route::post('shop/category/{id}/delete','Admin\ShopCategoryController@destroy');

    /*
    * ****************************************** Route admin shopping  product************************************
   */

    Route::get('shop/product','Admin\ShopProductController@index');
    Route::get('shop/product/create','Admin\ShopProductController@create');
    Route::get('shop/product/{id}/edit','Admin\ShopProductController@edit');
    Route::get('shop/product/{id}/delete','Admin\ShopProductController@delete');

    Route::post('shop/product', 'Admin\ShopProductController@store');
    Route::post('shop/product/{id}','Admin\ShopProductController@update');
    Route::post('shop/product/{id}/delete','Admin\ShopProductController@destroy');

    Route::get('shop/order', function () {
        return view('admin.content.shop.order.index');
    });
    Route::get('shop/review', function () {
        return view('admin.content.shop.review.index');
    });
     Route::get('shop/customer', function () {
         return view('admin.content.shop.customer.index');
     });
     Route::get('shop/brand', function () {
         return view('admin.content.shop.brand.index');
     });
     Route::get('shop/statistic', function () {
           return view('admin.content.shop.statistic.index');
       });
    /*
    * ****************************************** Route admin nội dung************************************
    */
     Route::get('shop/product/order', function () {
        return view('admin.content.shop.adminorder.index');
     });

    Route::get('content/category', function () {
        return view('admin.content.content.category.index');
    });
    Route::get('content/post', function () {
        return view('admin.content.content.post.index');
    });
    Route::get('content/page', function () {
        return view('admin.content.content.page.index');
    });
    Route::get('content/tag', function () {
        return view('admin.content.content.tag.index');
    });
    /*
    * ****************************************** Route admin menu************************************
    */
    Route::get('menu', function () {
        return view('admin.content.menu.index');
    });

    Route::get('menuitems', function () {
        return view('admin.content.menuitems.index');
    });
    /*
    * ****************************************** Route admin users************************************
    */
    Route::get('users', function () {
        return view('admin.content.users.index');
    });
    /*
    * ****************************************** Route admin media************************************
    */
    Route::get('media', function () {
        return view('admin.content.media.index');
    });
    /*
   * ****************************************** Route admin config************************************
   */
    Route::get('config', function () {
        return view('admin.content.config.index');
    });
    /*
   * ****************************************** Route admin newletters************************************
   */
    Route::get('newletters', function () {
        return view('admin.content.newletters.index');
    });
    /*
   * ****************************************** Route admin banners************************************
   */
    Route::get('banners', function () {
        return view('admin.content.banners.index');
    });
    /*
    * ****************************************** Route admin contacts************************************
    */
    Route::get('contacts', function () {
        return view('admin.content.contacts.index');
    });
    /*
   * ****************************************** Route admin email************************************
   */
    Route::get('email/inbox', function () {
        return view('admin.content.email.index');
    });
    Route::get('email/draft', function () {
        return view('admin.content.email.draft');
    });
    Route::get('email/send', function () {
        return view('admin.content.email.send');
    });

});
/*
 * route cho các nhà cung cấp sản phẩm (seller)
 * */
Route::prefix('seller') -> group(function (){
    // gom nhóm các route cho phần seller

    //URL: authen.com/seller/
    //route mặc định của seller
    Route::get('/', 'SellerController@index')->name('seller.dashboard');
    //URL: authen.com/seller/dashboard
    //route đăng nhập thành công
    Route:: get('/dashboard', 'SellerController@index')->name('seller.dashboard');
    /*URL: authen.com/seller/register
     *route trả về view để đăng ký tài khoản của seller
     * */
    Route::get('register', 'SellerController@create')->name('seller.register');
    /*URL: authen.com/seller/register
     * phương thức là Post, dùng để xử lý dữ liệu
     * Route dùng để đăng ký 1 seller từ form POST
     * */
    Route::post('register', 'SellerController@store')->name('seller.register.store');
    /*Route trả về view đăng nhập seller
     *URL: authen.com/seller/login
     *  */
    Route::get('login', 'Auth\Seller\LoginController@login')->name('seller.auth.login');
    /*
     * Route xử lý quá trình đăng nhập admin
     * URL: authen.com/seller/login
     * */
    Route::post('login', 'Auth\Seller\LoginController@loginSeller') -> name('seller.auth.loginSeller');
    /*
     * Route dùng để đăng xuất
     * URL: authen.com/seller/logout
     * */
    Route::post('logout', 'Auth\Seller\LoginController@logout') -> name('seller.auth.logout');
});
/*
 * route cho các nhà cung cấp sản phẩm (seller)
 * */
Route::prefix('shipper') -> group(function () {
    // gom nhóm các route cho phần shipper
    //URL: authen.com/shipper/
    //route mặc định của shipper
    Route::get('/', 'ShipperController@index')->name('shipper.dashboard');

    //URL: authen.com/shipper/dashboard
    //route đăng nhập thành công
    Route:: get('/dashboard', 'ShipperController@index')->name('shipper.dashboard');

    /*URL: authen.com/shipper/register
     *route trả về view để đăng ký tài khoản của shipper
     * */
    Route::get('register', 'ShipperController@create')->name('shipper.register');

    /*URL: authen.com/shipper/register
    * phương thức là Post, dùng để xử lý dữ liệu
    * Route dùng để đăng ký 1 shipper từ form POST
    * */
    Route::post('register', 'ShipperController@store')->name('shipper.register.store');
    /*Route trả về view đăng nhập shipper
     *URL: authen.com/shipper/login
     *  */
    Route::get('login', 'Auth\Shipper\LoginController@login')->name('shipper.auth.login');
    /*
     * Route xử lý quá trình đăng nhập shipper
     * URL: authen.com/shipper/login
     * */
    Route::post('login', 'Auth\Shipper\LoginController@loginShipper') -> name('shipper.auth.loginShipper');
    /*
     * Route dùng để đăng xuất
     * URL: authen.com/shipper/logout
     * */
    Route::post('logout', 'Auth\Shipper\LoginController@logout') -> name('shipper.auth.logout');
});



