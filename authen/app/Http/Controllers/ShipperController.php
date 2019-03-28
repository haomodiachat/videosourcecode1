<?php

namespace App\Http\Controllers;

use App\Model\ShipperModel;
use Illuminate\Http\Request;

class ShipperController extends Controller
{

    //hàm khởi tạo của class được chạy nay khi khởi tạo đối tượng
    //hàm này nó luôn được chạy trước các hàm khác trong class
    public function __construct()
    {
        $this -> middleware('auth:shipper') -> only('index');
    }

    /*
    * phương thức trả về view khi đăng nhập shipper thành công
    * */
    public function index() {
        return view('shipper.dashboard');
    }
    /*phương thức trả về view dùng để đăng ký tài khoản shipper
    * */
    public function create() {
        return view('shipper.auth.register');
    }
    public function store(Request $request) {
        //valideate dữ liệu được gửi từ form đi
        $this -> validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));
        //khởi tạo model để lưu shipper mới
        $SellerModel = new ShipperModel();
        $SellerModel -> name = $request -> name;
        $SellerModel -> email = $request -> email;
        $SellerModel -> password = bcrypt($request -> password);
        $SellerModel -> save();

        return redirect() -> route('shipper.auth.login');

    }
}
