<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    //phương thức trả về view dùng để đăng nhập cho admin
    public function login() {
        return view('admin.auth.login');
    }
    /*phương thức này dùng để đăng nhập cho admin
     * lấy thông tin từ form có method là post
     * */
    public function loginAdmin(Request $request) {
        //validate dữ liệu
        $this -> validate($request,array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));
        //đăng nhập
        if(Auth::guard('admin') -> attempt(
            ['email' => $request -> email, 'password' => $request -> password], $request -> remeber
        )){
            //nếu đăng nhập thành công thì sẽ chuyển hướng về view dashboard của admin
            return redirect() -> intended(route('admin.dashboard'));
        }
        //nếu đăng nhập thất bại thì quay trở về form đăng nhập
        //với giá trị của 2 ô input cũ là email và remember
        return redirect() -> back() -> withInput($request -> only('email', 'remember'));
    }
    /*
     * phương thức này dùng để đăng xuất
     * */
    public function logout() {
        Auth::guard('admin') -> logout();
        //chuyển hướng về trang login của admin
        return redirect() -> route('admin.auth.login');
    }
}
