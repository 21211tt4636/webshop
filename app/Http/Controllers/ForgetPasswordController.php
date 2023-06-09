<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;
class ForgetPasswordController extends Controller
{
    //lấy mật khẩu
    public function submitForgetPasswordForm(Request $request)
    {
        // Request $request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|exists:users',
        ]);
        $name = $request->only('name');
        $email =  $request->only('email');
        $token = '456789';
        $user = User::where('email', $email)->where('name', $name)->first();
        if ($user != null) {
            //chuyển từ array về string
            $user->name = $name['name'];
            $user->email = $email['email'];
            $hashedPassword = Hash::make($token);
            // lưu mật khẩu vào trường email trong model User
            $user->password = $hashedPassword;
            $user->save();
            if($user->role == '1')
            {
                $to_email = $email['email'];
                $username = $name['name'];
                $mailData = [
                    'username' => $username,
                    'to_email' => $to_email,
                    'title' => 'Reset Password',
                ];
                
                Mail::send('emails.test', compact('mailData'), function($email) use ($mailData) {
                    $email->subject($mailData['title']);
                    $email->to($mailData['to_email'], $mailData['username']);
                });
            }
        }
        
        return view('auth.login')->with('message', 'We have e-mailed your password reset link!');
    }
    
    public function forget_password()
    {
        return view('auth.forgetPassword');
    }

    //gửi mail tạo tài khoản

    public function sendMailCreateAccount(Request $request)
    {
        // Request $request
        $request->validate([
            'email' => 'required|email|unique:users',
        ]);
        $email = $request->only('email');
        $username = substr($email['email'], 0, strpos($email['email'], '@'));
        $password = '123456';
        //tạo account
        $user = new CustomAuthController();
        $data = ['name' => $username,
                 'email' => $email['email'],
                 'password' => Hash::make($password),
                 'role'=>$data['role']='1',
             ];
        $newUser = $user->create($data);
        //gửi mail xác nhận
        $mailData = [
            'title' => 'ShopShoes',
            'to_email' => $email['email'],
            'body' => 'Account has be created successfully
                        Name: '. $username .'Email: ' .$email['email'] .'Password: 123456'
        ];
        Mail::send('emails.demoMail', compact('mailData'), function($email) use ($mailData,$username) {
            $email->subject($mailData['title']);
            $email->to($mailData['to_email'],$username);
            $email->text($mailData['body']);
        });
        return redirect("/")->withSuccess('Send mail success');
    }
}
