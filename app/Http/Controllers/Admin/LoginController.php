<?php

namespace App\Http\Controllers\Admin;

use App\Org\code\Code;
use App\Model\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // 後台登入頁
    public function login()
    {
        return view('admin.login');
    }

    // 驗證碼
    public function code(Code $code)
    {
        return $code->make();
    }

    // 用戶登入
    public function doLogin(Request $request,Code $code)
    {
        // 1. 接收表單提交數據
        $input = $request->except('_token');
        // 2. 進行表單驗證
        $rule = [
            'username' => 'required|between:4,18',
            'password' => 'required|between:4,18|alpha_dash',
        ];
        $msg = [
            'username.required'   => '用戶名必須輸入',
            'username.between'    => '用戶名必須在4-18位之間',
            'password.required'   => '密碼必須輸入',
            'password.between'    => '密碼必須在4-18位之間',
            'password.alpha_dash' => '密碼必須是數字字母下滑線',
        ];
        $validator = Validator::make($input, $rule, $msg);

        if ($validator->fails()) {
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }
        // 驗證驗證碼
        if (strtolower($input['code']) != strtolower($code->get())) {
            return redirect('admin/login')->with('errors', '驗證碼錯誤');
        }
        // 驗證是否有此用戶(用戶 密碼 驗證碼
        $user =  AdminUser::where('user_name', $input['username'])->first();
        if (!$user) {
            return redirect('admin/login')->with('errors', '用戶名為空');
        }
        if ($input['password'] != Crypt::decrypt($user->user_pass)) {
            return redirect('admin/login')->with('errors', '密碼錯誤');
        }
        // 保存用戶訊息Session中
        session()->put('user',$user);
        // 跳轉到後台首頁
        return redirect('admin/index');
    }
    // 加密算法
    public function crypt($password)
    {
        $encrypt = Crypt::encrypt($password);
        dd($encrypt, Crypt::decrypt($encrypt));
        return Crypt::decrypt($password);
    }
}
