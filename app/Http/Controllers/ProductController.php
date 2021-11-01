<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\ProductRequest;
use App\Http\Requests\admin\ProductRequestUpdateAll;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    function getProducts()
    {
        $paginate = 6;
        $sumRecord = Product::count();
        $categories = Category::all();
        $data = Product::where('status', '!=', -1)
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
        try {
            $existName = Product::where('name', $req->input('name'))->exists();
            if ($existName) {
                session()->flash('nameExist', 'Name exists, please try again.');
                return redirect()
                    ->back()
                    ->withInput();
            }

            $category = new Product($req->all());
            $category->save();
            return redirect()
                ->back()
                ->with('create', 'Create new success!');
        }catch (\Exception $e){
            session()->flash('creatFail',"Creat new fail, please try again.");
            return redirect()->back();
        }
    }

    function delete($id)
    {
        try {
            $product = DB::table('products')->where('id', $id);

            if (!$product->exists()) {
                session()->flash('findFail', 'Error! An error occurred. Please try again later.');
                return redirect()
                    ->back();
            }
            $product->update([
                'status' => -1,
                'deleted_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
            session()->flash('delete','Delete product success.');
            return redirect()->back();

        }catch (\Exception $e){
            session()->flash('deleteFail',"Delete fail, please try again later.");
            return redirect()
                ->back();
        }
    }

    function deleteAll()
    {
        try {
            Product::deleteAll();
            session()->flash('delete', "Delete success!");
            return redirect()
                ->back();
        } catch (\Exception $e) {
            session()->flash('deleteFail', 'Delete record fail!!');
            return redirect()->back();

        }
    }

    function getInformation($id)
    {
        try {
            $products = Product::find($id);
            $categories = Category::all();
            return view('admin.template.product.form-product', [
                'item' => $products,
                'categories' => $categories,
            ]);
        } catch (\Exception $e) {
            session()->flash('findId', 'An error occurred. Please try again later.');
            return redirect()
                ->back();

        }
    }

    function update(ProductRequest $req)
    {
        try {
            $req->request->remove('_token');
            $req->request->add(['updated_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
            $product = DB::table('products')->where('id', $req->get('id'));
            $product->update($req->all());
            session()->flash('update', 'Update product success!');
            return redirect('/admin/product');
        }catch (\Exception $e){
            session()->flash('updateFail', 'Update fail, Please try again');
            return redirect()->back();
        }


    }

    function getUpdateAllForm($arrId)
    {
        $categories = Category::all();
        return view('admin.template.product.form-product', [
            'arrId' => $arrId,
            'categories' => $categories,
        ]);
    }

    function updateAll(ProductRequestUpdateAll $req)
    {
        try {
            $arrId = explode(',', $req->get('id'));
            $req->request->remove('_token');

            $req->request->add(['updated_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
            $product = DB::table('products')->whereIn('id', $arrId);
            $req->request->remove('id');
            $product->update($req->all());

            session()->flash('update', 'Successfully update product!');
            return redirect('/admin/product');
        } catch (\Exception $e) {
            session()->flash('update', 'Update product fail!');
            return redirect()->back();
        }
    }

    function search(Request $request)
    {
        try {
            $paginate = 9;
            $products = Product::findByStatusNotDelete()
                ->findByName()
                ->sortByName()
                ->sortByPrice()
                ->findByCategory();

            return view('admin.template.product.products', [
                'data' => $products->paginate($paginate),
                'oldName' => $request->get('name'),
                'paginate' => $paginate,
                'sumRecord' => $products->count(),
                'sortPrice' => $request->get('sortPrice'),
                'sortName' => $request->get('sortName'),
                'category' => $request->get('category'),
                'categories' => Category::all(),
            ]);
        }catch (\Exception $e){
            session()->flash('findFail','Not fail product.');
            return redirect()->back();
        }
    }
}
