<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\CategoryRequest;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    function getCategories()
    {
        $paginate = 6;
        $categories = DB::table('categories');
        $sumRecord = $categories->count();
        $data = $categories->paginate($paginate);
        return view('admin.template.category.categories', [
            'data' => $data,
            'sumRecord' => $sumRecord,
            'paginate' => $paginate
        ]);
    }

    function getForm()
    {
        return view('admin.template.category.form-category');
    }

    function create(CategoryRequest $req)
    {
        $existName = DB::table('products')->where('name', $req->input('name'))->exists();
        if ($existName) {
            return redirect()
                ->back()
                ->with('nameExist', 'Name Exists')
                ->withInput();
        }
        $category = new Category($req->all());
        $category->save();
        return redirect()
            ->back()
            ->with('success', 'Successfully created a new account!');
    }

    function delete($id)
    {
        $category = DB::table('categories')->where('id', $id);
        if (!$category->exists()) {
            return redirect()
                ->back()
                ->with('fail', 'Error! An error occurred. Please try again later. Please try again');
        }
        $category->update(['status' => 0]);
        return redirect()
            ->back()
            ->with('deleteSuccess', "Delete success!");
    }

    function getInformation($id)
    {
        $category = DB::table('categories')->where('id', $id);
        if (!$category->exists()) {
            return redirect()
                ->back()
                ->with('fail', 'Error! An error occurred. Please try again later. Please try again');
        }
        return view('admin.template.category.form-category', ['item' => $category->first()]);
    }

    function update(CategoryRequest $req)
    {
        $req->request->remove('_token');
        $req->request->add(['updated_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
        DB::table('categories')->where('id', $req->get('id'))->update($req->all());
        return redirect('/admin/category')
            ->with('successUpdate', 'Successfully created a new account!');
    }

    function search(Request $request)
    {
        $paginate = 6;
        $name = $request->get('query');
        $sort = $request->get('sort');
        if ($sort == "nameAsc") {
            $typeSort = 'asc';
        } else {
            $typeSort = 'desc';
        }

        $categories = DB::table('categories')
            ->where('name', 'LIKE', "%${name}%")
            ->orderBy('name', $typeSort);
        $sumRecord = $categories->count();
        $data = $categories->paginate($paginate)->appends($request->all());

        if (isset($data)) {
            return view('admin.template.category.categories', [
                'data' => $data,
                'oldQuery' => $name,
                'sumRecord' => $sumRecord,
                'paginate' => $paginate,
                'sort' => $sort
            ]);
        } else {
            return view('admin.template.category.categories')
                ->with('search', 'Not fount');
        }
    }
}
