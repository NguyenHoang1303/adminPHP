<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    function getProducts()
    {
        $paginate = 1;
        $sumRecord = DB::table('products')->count();
        $categories = DB::table('categories')->get();
        $data = DB::table('products')
            ->where('status', '!=', -1)
            ->paginate($paginate);
        return view('admin.template.product.products', [
            'data' => $data,
            'sumRecord' => $sumRecord,
            'paginate' => $paginate,
            'categories' => $categories
        ]);
    }

    function getForm()
    {
        return view('admin.template.product.form-product', [
            'categories' => Category::all()
        ]);
    }

    function create(ProductRequest $req)
    {
        $existName = DB::table('products')->where('name', $req->input('name'))->exists();
        if ($existName) {
            return redirect()
                ->back()
                ->with('nameExist', 'Name Exists')
                ->withInput();
        }

        $category = new Product($req->all());
        $category->save();
        return redirect()
            ->back()
            ->with('createOk', 'Successfully created a new product!');
    }

    function delete($id)
    {
        $category = DB::table('products')->where('id', $id);
        if (!$category->exists()) {
            return redirect()
                ->back()
                ->with('fail', 'Error! An error occurred. Please try again later. Please try again');
        }
        $category->update([
            'status' => -1,
            'deleted_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        return redirect()
            ->back()
            ->with('deleteSuccess', "Delete success!");
    }

    function getInformation($id)
    {
        $products = DB::table('products')->where('id', $id);
        $categories = DB::table('categories')->get();
        if (!$products->exists()) {
            return redirect()
                ->back()
                ->with('fail', 'Error! An error occurred. Please try again later. Please try again');
        }
        return view('admin.template.product.form-product', [
            'item' => $products->first(),
            'categories' => $categories,
        ]);
    }

    function update(ProductRequest $req)
    {
        $req->request->remove('_token');
        $req->request->add(['updated_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
        $category = DB::table('products')->where('id', $req->get('id'));
        $category->update($req->all());
        return redirect('/admin/product')
            ->with('successUpdate', 'Successfully update product!');
    }

    function search(Request $request)
    {
        $paginate = 10;
        $name = $request->get('query');
        $sort = $request->get('sort');
        $category = $request->get('category');

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

        $products = DB::table('products')
            ->where('status', '!=', -1);

        if (isset($name)) {
            $products->where('name', 'LIKE', "%$name%")
                ->orWhere('description', 'LIKE', "%$name%");
        }
        if (isset($category)) {
            if ($category != -1){
                $products->where('categoryId', $category);
            }

        }
        if (isset($typeSort) && isset($column)) {
            if ($sort != -1){
                $products->orderBy($column, $typeSort);
            }
        }


        $item = $products->paginate($paginate)->appends($request->all());
        $sum = $products->count();
        if (isset($item)) {
            return view('admin.template.product.products', [
                'data' => $item,
                'oldQuery' => $name,
                'paginate' => $paginate,
                'sumRecord' => $sum,
                'sort' => $sort,
                'category' => $category,
                'categories' => DB::table('categories')->get(),
            ]);
        } else {
            return view('admin.template.product.products')
                ->with('search', 'Not fount');
        }


    }
}
