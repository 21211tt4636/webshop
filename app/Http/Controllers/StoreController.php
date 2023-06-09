<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    //
    public function getProductStore(Request $request){
        $request = Request::capture();
        $url = $request->fullUrl();
        $productsofSelling = Product::orderBy('sell_number', 'desc')->take(3)->get();
        //Biến
        $total = intval($request->get('show'));
        // dd($total);die();
        $sortBy = $request->get('sort_by');
        $price_min = $request->get('price_min') ? intval($request->get('price_min')):1;
        $price_max = $request->get('price_max') ? intval($request->get('price_max')):999000;
        $brands = $request-> brand ?? [];
        $brand_id = array_keys($brands);
        $categorys = $request-> category ?? [];
        $category_id = array_keys($categorys);
        $type_id = $request->get('type_id');
        //
        if(Str::contains($url, 'sort_by' ) ){ 
            if($total != 20 && $total != 50){
                $products = '';
            }else{
                $products = $this->getProductOnSortandTypeid($request,$type_id,$total,$sortBy,$price_min,$price_max);
            }
        }else if(Str::contains($url, 'price' ) ){
            $products = $this->filter($request,$type_id,$category_id,$brand_id,$price_min,$price_max);
            
        }else{
            $products = Product::when(!empty($type_id), function ($query) use ($type_id) {
                return $query->where('type_id', $type_id);
            })->whereBetween('price', [1, 999 * 1000])->orderBy('id', 'asc')->take(20)->paginate(9);
        }
        // dd($total);die();
        return view('frontend.store', compact('products','type_id','productsofSelling'));
    }
    public function getProductOnSortandTypeid(Request $request,$type_id,$total,$sortBy){
        $products = '';

        switch($sortBy){
            case'lasted':
                $products = DB::query()->fromSub(function ($query) use ($total) {
                    $query->from('products')->limit($total);
                }, 'a')
                ->when(!empty($type_id), function ($query) use ($type_id) {
                    return $query->where('type_id', $type_id);
                })
                ->orderBy('id', 'asc')
                ->paginate(9);
                break;
            case'oldest':
                $products = DB::query()->fromSub(function ($query) use ($total) {
                    $query->from('products')->limit($total);
                }, 'a')
                ->when(!empty($type_id), function ($query) use ($type_id) {
                    return $query->where('type_id', $type_id);
                })
                ->orderBy('id', 'desc')
                ->paginate(9);
                break;
            default:
                $products = '';
                break;    
        }
        return  $products;
    }
    public function filter(Request $request,$type_id,$category_id,$brand_id,$price_min,$price_max){
        $products = Product::whereBetween('price', [$price_min, $price_max * 1000])
                ->when(!empty($type_id), function ($query) use ($type_id) {
                    return $query->where('type_id', $type_id);
                })
                ->when($brand_id, function ($query) use ($brand_id) {
                    return $query->whereIn('manu_id', $brand_id);
                })
                ->when($category_id, function ($query) use ($category_id) {
                    return $query->whereIn('type_id', $category_id);
                })
                ->paginate(9);
                // dd($products);die();
        return $products;
    }
   
}
