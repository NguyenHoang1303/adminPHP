<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    function getShop()
    {
        $paginate = 9;

        return view('user.template.shop-page', [
            'products' => DB::table('products')->where('status', '!=', -1)->paginate($paginate),
            'categories' => Category::withCount('products')->get(),
            'sumProduct' => Product::count(),
            'limit' => $paginate,
        ]);
    }

    function search(Request $request)
    {
        $paginate = 9;
        $query = $request->get('query');
        $sort = $request->get('sort');
        $categoryId = $request->get('category');

        switch ($sort) {
            case "nameAsc":
                $typeSort = 'asc';
                $column = 'name';
                break;
            case "nameDesc":
                $typeSort = 'Desc';
                $column = 'name';
                break;
            case "priceAsc":
                $typeSort = 'asc';
                $column = 'price';
                break;
            case "priceDesc":
                $typeSort = 'desc';
                $column = 'price';
                break;
        }

        $products = DB::table('products')->where('status', '!=', -1);

        if (isset($query)) {
            $products->where('name', 'LIKE', "%$query%")
                ->orWhere('description', 'LIKE', "%$query%");
        }

        if (isset($categoryId)) {
            $products->where('category_id', $categoryId);

        }

        if (isset($typeSort) && isset($column)) {
            if ($sort != -1) {
                $products->orderBy($column, $typeSort);
            }
        }

        $data = $products->paginate($paginate)->appends($request->all());
        return view('user.template.shop-page', [
            'products' => $data,
            'categories' =>Category::withCount('products')->get(),
            'sumProduct' => $products->count(),
            'limit' => $paginate,
            'oldQuery' => $query,
            'oldCategory' => $categoryId,
            'sort' => $sort,
        ]);
    }

    function getInformation($id)
    {
        return view('user.template.detail-page', [
            'product' => Product::find($id),
        ]);
    }
}
