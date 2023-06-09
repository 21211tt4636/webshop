<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufactures;
use App\Models\ProductProtypes;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
         //lấy User từ database
         public function getProduct(Request $request){
            $url = $request->fullUrl();
            $productList = '';
            if(str_contains($url, 'keyword') ){
                $request->validate([
                    'keyword' => 'required',
                ]);
                $keyword = $request->input('keyword');
                $productList = DB::table('products')
                ->join('protypes', 'products.type_id', '=', 'protypes.id')
                ->join('manufactures', 'products.manu_id', '=', 'manufactures.id')
                ->where('description', 'LIKE', '%'.$keyword.'%')
                ->select('products.id','products.type_id','protypes.type_name','products.manu_id','manufactures.manu_name','products.description','products.qty',
                'products.created_at','products.price','products.discount','products.name','products.image')
                ->paginate(4);
                
            }
            else{
                $productList = DB::table('products')
                ->join('protypes', 'products.type_id', '=', 'protypes.id')
                ->join('manufactures', 'products.manu_id', '=', 'manufactures.id')
                ->orderBy('products.created_at', 'desc')
                ->select('products.id','products.type_id','protypes.type_name','products.manu_id','manufactures.manu_name','products.description','products.qty',
                'products.created_at','products.price','products.discount','products.name','products.image')
                ->paginate(4);
            }
            // dd($productList);die();
            return view('admin.product',compact('productList'));
        }
        // //trang m user,..
        public function productadd()
        {
            $manu = Manufactures::all();
            $protype = ProductProtypes::all();
            return view('admin.product_add',compact('manu','protype'));
        }
        public function create(array $data)
        {
            // if(isset($request->input('checkbox_name'))) {
            //     // Nếu được chọn, xử lý thêm dữ liệu vào database
            //     // ...
            // }
          return Product::create([
            'name' => $data['name'],
            'manu_id' => $data['manu_id'],
            'type_id' => $data['type_id'],
            'qty' => $data['qty'],
            'price' => $data['price'],
            'sell_number' => $data['sell_number'] = 0,
            'image' => $data['fileToUpload'],
            'description' => $data['description'],
            'feature' => $data['feature'],
            'discount' => $data['discount'],
          ]);
        }     
        //thêm sản phẩm
        public function AddProduct(Request $request)
        {  
            $request->validate([
                'name' => 'required|max:100',
                'type_id' => 'required|integer|max:100',
                'manu_id' => 'required|integer|max:100',
                'description' => 'required|max:1000'
            ]);
            if($request->hasFile('fileToUpload')){
                $file = $request->file('fileToUpload');
                $filename = $file->getClientOriginalName();
                $file->move('front/img/',$filename);
                // $request->input('image', $filename);
            }
            $data = $request->all();
            $data['feature'] = $request->input('checkboxName') ? 1 : 0;
            $data['fileToUpload'] = $filename;
            $product = $this->create($data);
            return redirect('admin/product')->withSuccess('Thêm Thành công!');
        }
        //update sản phẩm
        public function editproduct($id)
        {
            $manu = Manufactures::all();
            $protype = ProductProtypes::all();
            $product = Product::findOrFail($id);
            return view('admin.product_add',compact('product','manu','protype'));
            
        }  
        public function update(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:100',
                'type_id' => 'required|integer|max:100',
                'manu_id' => 'required|integer|max:100'
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $product = Product::find($id);
            $product->name = $request->input('name');
            $product -> manu_id = $request->input('manu_id');
            $product -> type_id = $request->input('type_id');
            $product -> qty = $request->input('qty');
            $product -> price = $request->input('price');
            if($request->hasFile('fileToUpload')){
                $file = $request->file('fileToUpload');
                $filename = $file->getClientOriginalName();
                $product -> image = $filename;
                $file->move('front/img/',$filename);
                // $request->input('image', $filename);
            }
            // dd($request->input('fileToUpload'));die();
            $product -> description = $request->input('description');
            $product -> feature = $request->input('checkboxName') ? 1 : 0;
            $product -> discount = $request->input('discount');
            $product->save();
            return redirect('admin/product')->withSuccess('Update Thành công!!');;
        }
    
        public function viewDetailProduct($id){
            try {
                $product = Product::find($id);
                //productReviewer lấy trong Models
                if (!$product) {
                    abort(404); // Hiển thị trang lỗi 404 (Không tìm thấy)
                }else{
                    $comments = $product->productReviewer;
                }
                return view('admin.product_detail',compact('product','comments'));
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                // Xử lý ngoại lệ khi không tìm thấy sản phẩm
                abort(404); // Hiển thị trang lỗi 404 (Không tìm thấy)
            }
        }

        public function viewManagerDetail($id){
            $product = Product::find($id);
            $detail = $product->productDetail;
            return view('admin.manager_detail',compact('product','detail'));
        }
        //xem chi tiết mỗi sản phẩm
        public function view($id){
            $product = Product::find($id);
            return view('admin.detailproduct',compact('product'));
        }
        public function createDetail(array $data)
        {
          return ProductDetail::create([
            'product_id' => $data['product_id'],
            'size' => $data['size'],
            'color' => $data['color'],
          ]);
        }    
        public function AddProductDetail(Request $request)
        {  
            $request->validate([
                'size' => 'required',
                'color' => 'required',
            ]);
            $data = $request->all();
            $product_id = $request->input('product_id');
            $data['product_id'] =  $product_id ;
            // dd(intval($request->input('size')));die();
            $detail = ProductDetail::where('size',intval($request->input('size')));
            $productdetail = $this->createDetail($data);
            return redirect('admin/product_detail/'. $product_id .'/manager')->withSuccess('Thêm thành công');
        } 
        //xóa theo size , số lượng -1 nếu size = 1 thì xóa sản phẩm
        public function delete($id)
    {
        $size = ProductDetail::findOrFail($id);
        
        $product = $size->product;
        //dd($product->id);die();
        if ($product->qty > 0) {
            $product->qty -= 1;
            // $size->delete();
        }
        
        if ($product->qty === 1) {
            $size->product->delete();
        }

        $size->delete();
        // Các tác vụ xóa thành công khác hoặc chuyển hướng người dùng
        return redirect("admin/product_detail/".$product->id."/manager")->withSuccess('Xóa thành công');
    }
}
