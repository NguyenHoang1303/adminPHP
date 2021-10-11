<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\CategoryRequest;
use App\Http\Requests\admin\LoginRequest;
use App\Http\Requests\admin\RegisterRequest;
use App\Models\Admin;
use App\Models\Category;
use Faker\Provider\DateTime;
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
        if ($isLogin) {
            Session::put('loginId', $admin->id);
            return redirect('/admin');
        } else {
            return redirect()
                ->back()
                ->with('loginFail', 'Please check username or password')
                ->withInput();
        }
    }

    public function logOut()
    {
        if (Session::has('loginId')) {
            session()->pull('loginId');

        }
        return redirect('/admin/login');
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

//========================================================================================
// Example template
    function getDashboard()
    {
        return view('admin.template.dashboard');
    }

    function getForm()
    {
        return view('admin.template.form');
    }

    function getTable()
    {
        return view('admin.template.table');
    }

    function getProfile()
    {
        $admin = array();
        if (Session::has('loginId')) {
            $admin = DB::table('admins')->find(Session::get('loginId'));

        }
        return view('admin.template.profile', ['data' => $admin]);
    }
//==========================================================================================
//CATEGORY Handler

    function getCategories()
    {
        $data = DB::table('categories')->get();
        return view('admin.template.category.categories', ['data' => $data]);
    }

    function getFormCategory()
    {
        return view('admin.template.category.form-category');
    }

    function createCategory(CategoryRequest $req)
    {
        $existName = DB::table('categories')->where('name', $req->input('name'))->exists();
        if ($existName) {
            return redirect()
                ->back()
                ->with('nameExist', 'Name Exists')
                ->withInput();
        }
        $category = new Category();
        $category->name = $req->get('name');
        $category->description = $req->get('description');
        $category->thumbnail = $req->get('thumbnail');
        $category->status = 1;
        $category->save();
        return redirect()
            ->back()
            ->with('success', 'Successfully created a new account!');
    }

    function deleteCategory($id)
    {
        $category = DB::table('categories')->where('id', $id);
        if (!$category->exists()){
            return redirect()
                ->back()
                ->with('fail','Error! An error occurred. Please try again later. Please try again');
        }
        $category->update(['status'=> 0]);
        return redirect()
            ->back()
            ->with('deleteSuccess',"Delete success!");
    }

    function getInformationCategory($id)
    {
        $category = DB::table('categories')->where('id', $id);
        if (!$category->exists()){
            return redirect()
                ->back()
                ->with('fail','Error! An error occurred. Please try again later. Please try again');
        }
        return view('admin.template.category.form-category', ['item'=> $category->first()]);
    }

    function updateInformationCategory(CategoryRequest $req)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $category = DB::table('categories')->where('id',$req->get('id'));
        $category->update([
            'name'=> $req->get('name'),
            'description'=> $req->get('description'),
            'thumbnail'=> $req->get('thumbnail'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/admin/category')
            ->with('successUpdate', 'Successfully created a new account!');
    }
}
