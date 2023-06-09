<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductReviewer;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
     //view product
     public function viewProduct($id){
        // var_dump($id);die();
        $productdetail = DB::table('products')
        ->join('manufactures', 'products.manu_id', '=', 'manufactures.id')
        ->join('protypes', 'products.type_id', '=', 'protypes.id')
        ->select('products.id','products.type_id','protypes.type_name','products.manu_id','manufactures.manu_name','products.description',
        'products.created_at','products.price','products.discount','products.name','products.image')
        ->where('products.id', '=', $id)
        ->first();
        if (!$productdetail) {
            abort(404); // Hiển thị trang lỗi 404 (Không tìm thấy)
        }
        //var_dump($productdetail);die();
        $comments = $this->getReview($id);
        // dd($currentPageItems);die();
        $productOfBrand = $this->getProductBrand($id);
        //dd($productOfBrand);die();
        $detail = $this->getDetail($id);
        //dd($detail);die();
        $totalComments = ProductReviewer::where('product_id', $id)->count();
        // $review = $this->AddReviewer($request,$id);
        return view('frontend.product',compact('productdetail','comments','productOfBrand','detail','totalComments'))->render();
    }
    //lấy hãng sản phẩm
    public function getProductBrand($id)
    {
        $product = Product::findOrFail($id); // Lấy sản phẩm theo ID
        $brand = $product->manu_id;
         // Lấy sản phẩm theo hãng sản phẩm
        $productsOfBrand = Product::where('manu_id', $brand)
        ->whereNotIn('id', [$id]) // Loại bỏ sản phẩm đang xem
        ->take(4)->get();

        return $productsOfBrand;
    }
    //lấy comments
    public function getReview($id){
        $product = Product::find($id);
        //productReviewer lấy trong Models
        $comments = $product->productReviewer()->paginate(3);
        //$comments = $product->productReviewer;
        return $comments;
   }
   //lấy deatails
   public function getDetail($id){
        $product = Product::find($id);
        $detail = $product->productDetail;
        //$comments = $product->productReviewer;
        return $detail; 
    }
   //thêm Comment
    public function AddReviewer(Request $request,$id)
    {  
        $review = Product::find($id);
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
            'content' => 'required|max:200',
            'rating' => 'required'
        ]);

        $review = ProductReviewer::create([
            'product_id' => $id,
            'email' => $request->input('email'),
            'name_reviewer' => $request->input('name'),
            'content' => $request->input('content'),
            'rating' => $request->input('rating')
        ]);
        $review->save();
        return redirect()->route('product_detail', ['id' => $id]);
    }
}
