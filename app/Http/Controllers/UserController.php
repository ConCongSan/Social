<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {
        return View('Login');
    }

    public function Handle_Login(Request $request)
    {
        $data = [
            'Username' =>$request->Username,
            'password'=>$request->password,
        ];
        //remember_token dùng để ghi nhớ đăng nhập
        if(Auth::attempt($data, $request->has('remember_token')))
                return View('xin chao');
        return redirect()->back()->with("Error","Đăng nhập không thành công!");   
    }
}