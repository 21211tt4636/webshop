<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufactures;
use Illuminate\Support\Facades\Hash;

class ManuManagerController extends Controller
{
    //
    //lấy User từ database
    public function getManu(){
        $manuList = Manufactures::paginate(4);
        return view('admin.manu',compact('manuList'));
    }
    //trang thêm user,..
    public function manuadd()
    {
        return view('admin.manu_add');
    }
    public function create(array $data)
    {
      return Manufactures::create([
        'manu_name' => $data['name'],
      ]);
    }    
    //thêm user
    public function AddManu(Request $request)
    {  
        $request->validate([
            'name' => 'required',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("admin/manu")->with('status','You have signed-in');
    }
    //update user
    public function editmanu($id)
    {
        $manu = Manufactures::findOrFail($id);
        return view('admin.manu_add',compact('manu'));
        
    }  
    public function update(Request $request, $id)
    {
        $manu = Manufactures::find($id);
        $manu->manu_name = $request->input('name');
        $manu->save();
        return redirect('admin/manu');
    }

    public function delete($id){
        $manu = Manufactures::findOrFail($id);
        $error = "Không thể xóa Hãng có tên:" .$manu->manu_name;
        if ($manu->products->count() > 0){
            return redirect("admin/manu")->with('error', $error);
        }else{
            $manu->delete();
        }
        return redirect("admin/manu");
    }
}
