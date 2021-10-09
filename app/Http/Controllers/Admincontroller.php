<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admincontroller extends Controller
{
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
