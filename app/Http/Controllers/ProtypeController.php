<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductProtypes;
use Illuminate\Support\Facades\Hash;

class ProtypeController extends Controller
{
    //
    //lấy User từ database
    public function getProtype(){
        $protypeList = ProductProtypes::paginate(4);
        return view('admin.protype',compact('protypeList'));
    }
    //trang thêm user,..
    public function protypeadd()
    {
        return view('admin.protype_add');
    }
    public function create(array $data)
    {
      return ProductProtypes::create([
        'type_name' => $data['name'],
      ]);
    }    
    //thêm protype
    public function AddProtype(Request $request)
    {  
        $request->validate([
            'name' => 'required',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("admin/protype")->with('status','You have signed-in');
    }
    //update user
    public function editprotype($id)
    {
        $protype = ProductProtypes::findOrFail($id);
        return view('admin.protype_add',compact('protype'));
        
    }  
    public function update(Request $request, $id)
    {
        $protype = ProductProtypes::find($id);
        $protype->type_name = $request->input('name');
        $protype->save();
        return redirect('admin/protype');
    }

    public function delete($id){
        $protype = ProductProtypes::findOrFail($id);
        $error = "Không thể xóa Loại hàng có tên:" .$protype->type_name;
        if ($protype->products->count() > 0){
            return redirect("admin/protype")->with('error', $error);
        }else{
            $protype->delete();
        }
        return redirect("admin/protype");
    }
}
