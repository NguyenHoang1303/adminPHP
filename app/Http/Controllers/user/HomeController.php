<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getViewHome()
    {
        return view('user.template.home-page');
    }

    function test()
    {
        $p = Category::withCount('products')->get();
        foreach ($p as $a){
         echo $a->products_count . "<br>";
        }

    }
}
