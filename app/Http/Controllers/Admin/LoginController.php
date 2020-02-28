<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    //
    public function login(){
        return view('admin.login');
    }

    public function doLogin(Request $request){
        $input = $request->except('_token');
        $rule = [
            'user_name' => 'required|between:4,18',
            'user_pass' => 'required'
        ];
        $validator = Validator::make($input,$rule);

        if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }

        // 3、验证用户信息是否存在
        $user = User::where('user_name',$input['user_name'])->first();

        if(!$user){
            return redirect('admin/login')->withErrors('用户名不存在');
        }
        // dd($user->user_pass);
        // dd($input['user_pass']);
        if($input['user_pass'] != Crypt::decrypt($user->user_pass)){
            return redirect('admin/login')->withErrors('用户名与密码不匹配');
        }

        // 4、将用户信息存入sesion中
        session()->put('user',$user);

        // 5、跳转到后台首页
        return redirect('admin/index');

    }

    // 后台首页
    public function index(){
        return view('admin.index');
    }

    public function welcome(){
        return view('admin.welcome');
    }

    // 加密
    // public function jiami(){
    //     $user_pass = '123456';
    //     $crypt_pass = Crypt::encrypt($user_pass);
    //     if($user_pass == Crypt::decrypt($crypt_pass)){
    //         return 'OK';
    //     }
    // }
}
