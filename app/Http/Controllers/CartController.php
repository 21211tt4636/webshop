<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class CartController extends Controller
{
   //add_cart
    public function add(Request $request){
            $product = Product::find($request->id);
            $price = $product->discount!=null? $product->price - ($product->price * $product->discount / 100) : $product->price;
            $qty = $request->filled('quantity') ? $request->quantity : 1;
            //dd($qty);die();
            $size = $request->filled('size') ? $request->size : 39;
            //$detail = $request->get('quantity') != 0 ? $request->get('quantity') : 1;
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $price,
                'qty' => $qty,
                'weight'=> $product->weight ?? 0,
                'options' => array(
                    'image' => $product->image,
                    'feature' => $product->feature,
                    'discount' => $product->discount,
                    'size' => $size,
                    // Các thuộc tính khác của sản phẩm (nếu có)
                )
            ]);
            //Cart::destroy();
            //dd(Cart::content());
        return redirect()->back();
    }

    public function showCart(){
        $cart = Cart::content();
        //dd($cart);die();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('frontend.cart',compact('cart', 'total', 'subtotal'));
    }

    //xóa giỏ hàng
    public function delete(Request $request){
        if($request->ajax()){
            $response['cart'] = Cart::remove($request->rowId);
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
        return back();
    }
    //sửa giỏ hàng
    public function update(Request $request){
        if($request->ajax()){
            $response['cart'] = Cart::update($request->input('rowId'),$request->input('qty'));
            $response['productPrice'] = Cart::get($request->input('rowId'))->price;
            $response['count'] = Cart::count();
            $response['total'] = Cart::total();
            $response['subtotal'] = Cart::subtotal();

            return $response;
        }
    }
}
