<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CheckoutController extends Controller
{
    //
    public function showCheckout(){
        return view('frontend.checkout');
    }

    public function addOrder(Request $request){
        //thêm đơn hàng
        $request->validate([
            'user_id' => $request->input('iduser'),
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
        ]);
           
        $dataorder = $request->all();
        //dd($dataorder);die();
        $order = $this->createOrder($dataorder);
        
        //thêm chi tiết đơn hàng
        $carts = Cart::content();
        foreach($carts as $cart){
            $detail_order = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'amount' => $cart->price,
                'total' => $cart->qty * $cart->price,
            ];
            //tạo chi tiết đơn hàng
            $order_detail = OrderDetail::create($detail_order);
            //update lại số lượng bán và số lượng của sản phẩm
            $product_sell_number=Product::find($cart->id);
            $product_sell_number -> sell_number += $cart->qty;
            $product_sell_number -> qty = $product_sell_number -> qty - $cart->qty;
            // dd($product_sell_number -> sell_number);die();
            $product_sell_number->save();
        }
        dd($order_detail->order_id);die();
        $products = OrderDetail::where('order_id',$order_detail->order_id )->get();
        dd($products);die();
        //huy don hang sau khi dat hang thanh cong
        Cart::destroy(); 
        
        
        //trả về kết quả thông báo
        return view('frontend.donhang',compact('order','products'))->with('Success','Mua Hàng Thành Công');
    }

    //tạo hàm create đơn hàng

    public function createOrder(array $data){
        return Order::create([
            'user_id'=>$data['iduser'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'address' => $data['address'],
            'city' => $data['city'],
            'phone' => $data['phone'],
          ]);
    }
    //hủy đơn hàng
    public function delete($id){
        $order = Order::findOrFail($id);
        $order->delete();
        $order_detail = OrderDetail::where('order_id', $id)->delete();
        return redirect("checkout")->withSuccess('Hủy Thành Công!!');
    }
    
}
