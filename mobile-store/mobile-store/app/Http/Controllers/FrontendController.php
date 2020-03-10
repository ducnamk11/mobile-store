<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\CommentModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $data['featured'] = ProductModel::where('prod_featured', 1)->orderBy('prod_id', 'desc')->take(8)->get();
        $data['new'] = ProductModel::orderBy('prod_id', 'desc')->take(8)->get();

        return view('frontend.home', $data);
    }

    public function postComment(Request $request, $id)
    {
        $comment = new CommentModel;
        $comment->com_name = $request->name;
        $comment->com_email = $request->email;
        $comment->com_content = $request->content;
        $comment->com_product = $id;
        $comment->save();
        return back();
    }

    public function getDetail($id)
    {
        $data['item'] = ProductModel::find($id);
        $data['comments'] = CommentModel::where('com_product', $id)->get();

        return view('frontend.details', $data);
    }

    public function getCategory($id)
    {
        $data['catename'] = CategoryModel::find($id);
        $data['items'] = ProductModel::where('prod_cate', $id)->orderBy('prod_id', 'desc')->paginate(8);
        return view('frontend.category', $data);
    }

    public function getSearch(Request $request)
    {
        $result = $request->result;
        $result = str_replace(' ', '%', $result);
        $data['keyword'] = $result;
        $data['items'] = ProductModel::where('prod_name', 'like', '%' . $result . '%')->get();
        return view('frontend.search', $data);
    }

}
