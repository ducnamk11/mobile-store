<?php
// tài liệu : https://github.com/darryldecode/laravelshoppingcart
namespace App\Http\Controllers;

use App\Models\ProductModel;
use Cart;
use Illuminate\Http\Request;
use Mail;

class CartController extends Controller
{
    public function getAddCart($id)
    {
        $product = ProductModel::find($id);
        Cart::add(array(
            array(
                'id' => $id,
                'name' => $product->prod_name,
                'price' => $product->prod_price,
                'quantity' => 1,
                'attributes' => array('img' => $product->prod_img)
            )
        ));
        return redirect('cart/show');
    }

    public function getShowCart()
    {
        $data['total'] = Cart::getTotal();
        $data['items'] = Cart::getContent();
        return view('frontend/cart', $data);
    }

    public function getDeleteCart($id)
    {
        if ($id == 'all') {
            Cart::clear();
        } else {
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request)
    {
        Cart::update($request->id, [$request->quantity]);
    }
    public function postComplete(Request $request)
    {
        $data['info'] = $request->all();
        $email = $request->email;
        $data['cart'] = Cart::getContent();
        $data['total'] = Cart::getTotal();
//        return view('frontend.email', $data);
//        Mail::send('frontend.email', $data,function ($message) use ($email)
//    {
//        $message->from('www.ducnam7476@gmail.com', 'Ducnam');
//        $message->to($email, $email);
//        $message->cc('ducnam7476@gmail.com', 'nam Jr');
//        $message->subject('Xác Nhận hoá đơn mua hàng');
//    });
        Cart::clear();
        return redirect('complete');
    }
    public function getComplete()
    {
        return view('frontend.complete');
    }
}
