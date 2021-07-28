<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view("auth.login");
    }

    public function register(Request $request)
    {
        return view("auth.register");
    }

    public function doLogin(Request $request) {
        $input = $request->all();
        unset($input['_token']);

        Auth::guard('admin')->attempt($input);
        Auth::attempt($input);

        return redirect('/dashboard');
    }

    public function logout() {
        Auth::logout();
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function doRegister(Request $request) {
        $rules = [
            'email'=>'required|email|unique:customer,email',
        ];
        $this->validate($request, $rules);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        Customer::create($input);
    }
}
