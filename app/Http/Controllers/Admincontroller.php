<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Admincontroller extends Controller
{
    public function getFormLogin()
    {
        return view("admin.template.login");
    }

    public function login(LoginRequest $request)
    {
        $data = $request->all();
        $admin = DB::table('admins')->where('email', $data['email'])->first();
        $isLogin = $admin != null && Hash::check($data['password'], $admin->password);
        Session::put('loginId', $admin->id);
        if ($isLogin) {
            $request->session()->put('loginId', $admin->id);
            return redirect('/admin');
        } else {
            return redirect()
                ->back()
                ->with('loginFail', 'Please check username or password')
                ->withInput();
        }
    }

    public function logOut(){
        if (Session::has('loginId')){
            session()->pull('loginId');
            return redirect('/login');
        }
    }

    public function getFormRegister()
    {
        return view("admin.template.register");
    }

    public function register(RegisterRequest $request)
    {
        $existUser = DB::table('admins')->where('email', $request->input('email'))->exists();
        $email = $request->get('email');
        $fullname = $request->get('fullname');
        $phone = $request->get('phone');
        $password = Hash::make($request->get('password'));
        if ($existUser) {
            return redirect()
                ->back()
                ->with('emailExist', 'Email Exists')
                ->withInput();
        } else {
            $admin = new Admin();
            $admin->email = $email;
            $admin->fullname = $fullname;
            $admin->password = $password;
            $admin->phone = $phone;
            $admin->save();
            return redirect()
                ->back()
                ->with('success', 'Successfully created a new account');
        }

    }


    function getDashboard(){
        return view('admin.template.dashboard');
    }

    function getForm(){
        return view('admin.template.form');
    }
    function getTable(){
        return view('admin.template.table');
    }
}
