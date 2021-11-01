<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    function getShop()
    {
        $paginate = 9;

        return view('user.template.shop-page', [
            'products' => Product::findByStatusNotDelete()->paginate($paginate),
            'categories' => Category::withCount('products')->get(),
            'sumProduct' => Product::count(),
            'limit' => $paginate,
        ]);
    }

    function search(Request $request)
    {
        $paginate = 9;
        $products = Product::findByStatusNotDelete()
            ->findByName()
            ->sortByName()
            ->sortByPrice()
            ->filterPrice()
            ->findByCategory();
        return view('user.template.shop-page', [
            'products' => $products->paginate($paginate),
            'oldName' => $request->get('name'),
            'minPrice' => $request->get('minPrice'),
            'maxPrice' => $request->get('maxPrice'),
            'limit' => $paginate,
            'sumProduct' => $products->count(),
            'sortPrice' => $request->get('sortPrice'),
            'sortName' => $request->get('sortName'),
            'oldCategory' => $request->get('category'),
            'categories' => Category::withCount('products')->get(),
        ]);

    }

    function getInformation($id)
    {
        $arrId = [];
        if (session()->has('recent_view')) {
            $arrId = session()->get('recent_view');
        }
        if (!in_array($id,$arrId)){
            if (sizeof($arrId) > 9){
                array_shift($arrId);
            }
            array_push($arrId,$id);
        }
        array_push($arrId, $id);
        session()->put('recent_view', $arrId);
        $productsRecent = $this->getRecentProduct();
        return view('user.template.detail-page', [
            'product' => Product::find($id),
            'productsRecent'=>$productsRecent,
        ]);
    }

    function getRecentProduct()
    {
        $products = [];
        if (session()->has('recent_view')){
            $products = Product::findMany(session()->get('recent_view'));
        }
        return $products;
    }



}
