<?php

namespace App\Http\Controllers;

use App\Model\SellerModel;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //hàm khởi tạo của class được chạy nay khi khởi tạo đối tượng
    //hàm này nó luôn được chạy trước các hàm khác trong class
    public function __construct()
    {
        $this -> middleware('auth:seller') -> only('index');
    }
    /*
    * phương thức trả về view khi đăng nhập seller thành công
    * */
    public function index() {
        return view('seller.dashboard');
    }
    /*phương thức trả về view dùng để đăng ký tài khoản seller
    * */
    public function create() {
        return view('seller.auth.register');
    }

    public function store(Request $request) {
        //valideate dữ liệu được gửi từ form đi
        $this -> validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));
        //khởi tạo model để lưu admin mới
        $SellerModel = new SellerModel();
        $SellerModel -> name = $request -> name;
        $SellerModel -> email = $request -> email;
        $SellerModel -> password = bcrypt($request -> password);
        $SellerModel -> save();

        return redirect() -> route('seller.auth.login');

    }

}
