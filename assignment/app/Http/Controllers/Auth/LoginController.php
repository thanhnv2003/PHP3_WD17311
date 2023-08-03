<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function login(LoginRequest $request){
        if ($request->isMethod('POST') && $request->btnLogin != '') {
//            dd($request->all());
            //password bắt buộc khi đăng ký phải hash:make
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                //đăng nhập thành công

                // Nếu xác thực thành công, lưu thông tin đăng nhập vào session
                $request->session()->regenerate();
                $user = Auth::user();
                $request->session()->put('user_id', $user->id);
                $request->session()->put('user_name', $user->name);
                $request->session()->put('user_role', $user->role);

                if (Session::get('user_role') == 'Admin'){
                    return redirect()->route('admin');
                }else{
                    // Các thông tin khác bạn muốn lưu vào session cũng có thể thêm ở đây
                    return redirect()->route('index');
                }
            } else {
                //đăng nhập không thành công
                Session::flash('error', 'Sai mật khẩu hoặc email');
                return redirect()->route('login');
            }
        }
        return view('client.auth.login-register');
}
    public function register(LoginRequest $request){
        if ($request->isMethod('POST') && $request->btnRes != ''){
            $data = new User;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->save();
            if ($data->id){
                Session::flash('success', 'Đăng ký thành công');
                return redirect()->route('login');
            }
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}

