<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Models\CategoryModel;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $data['cateList'] = CategoryModel::all();
        return view('backend.category', $data);
    }

    public function postCategory(AddCategoryRequest $request)
    {
        $category = new CategoryModel();
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        return back();
    }

    public function getEditCategory($id)
    {
        $data['cate'] = CategoryModel::find($id);
        return view('backend.editcategory', $data);
    }

    public function postEditCategory(EditCategoryRequest $request, $id)
    {
        $category = CategoryModel::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name);
        $category->save();
        return redirect()->intended('admin/category/');
    }

    public function getDeleteCategory($id)
    {
        CategoryModel::destroy($id);
        return back();
    }
}
