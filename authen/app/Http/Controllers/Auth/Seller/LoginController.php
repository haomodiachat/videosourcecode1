<?php

namespace App\Http\Controllers\Auth\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:seller')->except('logout');
    }
    //phương thức trả về view dùng để đăng nhập cho seller
    public function login()
    {
        return view('seller.auth.login');
    }
    /*phương thức này dùng để đăng nhập cho seller
     * lấy thông tin từ form có method là post
     * */
    public function loginSeller(Request $request) {
        //validate dữ liệu
        $this -> validate($request,array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));
        //đăng nhập
        if(Auth::guard('seller') -> attempt(
            ['email' => $request -> email, 'password' => $request -> password], $request -> remeber
        )){
            //nếu đăng nhập thành công thì sẽ chuyển hướng về view dashboard của seller
            return redirect() -> intended(route('seller.dashboard'));
        }
        //nếu đăng nhập thất bại thì quay trở về form đăng nhập
        //với giá trị của 2 ô input cũ là email và remember
        return redirect() -> back() -> withInput($request -> only('email', 'remember'));
    }

}
