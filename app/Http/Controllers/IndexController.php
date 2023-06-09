<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufactures;
use App\Models\Product;
use App\Models\ProductProtypes;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class IndexController extends Controller
{
    //lấy biến từ appserviceprovide sử dụng cho toàn bộ web
    // $typeList = config('app.variable_name');
        // dd($typeList);die();
    //view profile
    public function viewProfile($id){
        $user = User::findOrFail($id);
        return view('frontend.profile',compact('user'));
    }
    // hàm tìm kiếm
    public function search(Request $request){
        $request->validate([
            'searchProduct' => 'required',
        ]);
        $searchTerm = $request->input('searchProduct');
        $searchType = $request->input('search');
        if($searchTerm != null){
            if(isset($searchType) && $searchType != 0){
                $products = DB::table('products')
                ->where('description', 'LIKE', '%'.$searchTerm.'%')
                ->where('type_id', '=', $searchType)
                ->paginate(8);

            }else{
                $products = DB::table('products')
                ->where('description', 'LIKE', '%'.$searchTerm.'%')
                ->paginate(8);
            }
            //dd($products);die();
        }
        return view('frontend.blank',compact('products'));
           
    }
    // //view store.php
    // public function viewStore(){
    //     return view('frontend.store');
    // }
    
    //lấy manu and type
    public function getTypeIndex(){
        $type = ProductProtypes::all()->take(3);
        $products = Product::all()->take(7);
        $products1 = Product::where('type_id', 1)->get();
        $products2 = Product::where('type_id', 2)->get();
        $products3 = Product::where('type_id', 3)->get();
        $products4 = Product::query()->orderBy('discount', 'desc')->take(5)->get();
        $products5 = Product::where('type_id', 1)->orderBy('discount', 'desc')->take(5)->get();
        $products6 = Product::where('type_id', 2)->orderBy('discount', 'desc')->take(5)->get();
        $products7 = Product::where('type_id', 3)->orderBy('discount', 'desc')->take(5)->get();
        return view('frontend.index')->with(compact('type','products','products1','products2','products3',
        'products4','products5','products6','products7'));
    }

}
