<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function customLogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('name','email', 'password' );
        if (Auth::attempt($credentials) ) {
            $id_user = Auth::user()->id;
            session()->put('id_user', $id_user);
            if(Auth::user()->role == '1')
            {
                return redirect()->intended('/')->withSuccess('Signed in');
            }else{
                return redirect()->intended('admin/user')->withSuccess('Đăng nhập thành công');
            }
        }
  
        return redirect("/login")->withErrors(['error' => 'Thông tin đăng nhập không chính xác']);
    }

    public function registration()
    {
        return view('auth.registration');
    }
      
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("/login")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role'=>$data['role']='1'
      ]);
    }    
    //đăng nhập thành công
    public function dashboard()
    {
        return view('frontend.index');
    }
    //đăng xuất
    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/login');
    }
    //lấy User từ database
    public function getUser(){
        $userList = User::paginate(4);
        return view('admin.user',compact('userList'));
    }
    //trang thêm user,..
    public function useradd()
    {
        return view('admin.user_add');
    }
    //thêm user
    public function AddUser(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("admin/user")->withSuccess('You have signed-in');
    }
    //update user
    public function editprofile($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user_add',compact('user'));
        
    }  
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $password = $request->input('password');
        $hashedPassword = Hash::make($password);
        // lưu mật khẩu vào trường email trong model User
        $user->password = $hashedPassword;
        $user->save();
        return redirect('admin/user');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect("admin/user");
    }
}
