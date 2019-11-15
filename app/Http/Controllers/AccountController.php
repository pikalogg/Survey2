<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Confirm;
use Mail;
use App\Mail\ConfirmUser;
use App\Mail\RegisteredUser;
use App\Notification;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }

    public function getLogin()
    {
    	return view('login');
    }

    public function postLogin(Request $request){
    	$rules = [
    		'email' => 'required|min:6',
    		'password' => 'required|min:6'
    	];

    	$messages = [
    		'email.required'  => 'Email không được để trống',
    		'email.min'		 => 'Email chứa ít nhất 6 ký tự', 
    		'password.required' => 'Mật khẩu không được để trống',
    		'password.min'		=> 'Mật khẩu phải chứa ít nhất 6 ký tự'
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);

    	if($validator->fails()){
    		return redirect()->back()->withErrors($validator);
    	}
    	$email = $request->input('email');
        $password = $request->input('password');
        if(Auth::attempt(['email'=>$email,'password'=>$password,'level'=>5])||
            Auth::attempt(['email'=>$email,'password'=>$password,'level'=>4])||
            Auth::attempt(['email'=>$email,'password'=>$password,'level'=>3])||
            Auth::attempt(['email'=>$email,'password'=>$password,'level'=>2])){
    		return redirect('/admin');
        }else if(Auth::attempt(['email'=>$email,'password'=>$password,'level'=>1])){
    		return redirect('/');
        }
        else{
    		$errors = new MessageBag(['errorLogin' => 'Tên đăng nhập hoặc mật khẩu không chính xác']);
    		return redirect()->back()->withErrors($errors);
    	}
    }

    public function getRegister(){
        return view('register');
    }

    public function postRegister(Request $request){
        $rules = [
            'name'          => 'required|min:1',
            'password'      => 'required|min:6',
            're_password'   => 'required|min:6',
            'phone'         => 'required|regex:/(0)[0-9]{9}/',
            'email'         => 'required|email'
        ];
        $messages = [
            'email.required'    => 'Email không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min'      => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'name.required'     => 'Không được để trống',
            're_password.required'      => 'Không được để trống',
            'phone.required'        => 'Không được để trống',
            'phone.regex' => 'Số chứng minh thư à?',
            'name.min'              => 'Tên chứa ít nhất 3 ký tự'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()) {
            $notifi = new Notification();
            $notifi->content = "Tạo thất bại " . $request->email;
            $notifi->save();
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $email = $request->input('email');
            $password = $request->input('password');
            $user= User::where('email','=',$email)->get();
            if(count($user)) {
                $errors = new MessageBag(['errorComfirmEmail' => 'Email đã được sử dụng']);
                $notifi = new Notification();
                $notifi->content = "Tạo người dùng bị trùng " . $request->email;
                $notifi->save();
                return redirect('/register')->withInput()->withErrors($errors);
            }
            if($request->password != $request->re_password){
                $err = new MessageBag(['errorPassword' => 'Mật khẩu không khớp']);
                return redirect('/register')->withInput()->withErrors($err);
            }
            $user = new User();
            $user->name = $request->name;
            $user->email=$request->email;
            $user->password= Hash::make($request->password);
            $user->phone= $request->phone;
            $user->level= 0;
            $user->save();

            $code = new Confirm();
            $code->user_id= $user->id;
            $code_confirm= "" . rand(1000,9999);
            $code->status=0;
            $code->code= $code_confirm;
            $code->save();

            Mail::to($request->email)->send(new ConfirmUser($code_confirm, $user->name));

            return redirect('/confirm');
        }
        return redirect('/');
    }

    public function confirmUser($code)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time= time();
        $codeUser= Confirm::where('code',$code)->get();
        // return $codeUser[0];
        if(count($codeUser)!=0){
            $codeUser =  $codeUser[0];
            // $timeCreate = strtotime($codeUser['create_at']);
            // return $time - strtotime($codeUser['created_at']);
            if($time - strtotime($codeUser['created_at']) > 600){
                Confirm::find($codeUser->id)->delete();
                return redirect('/login');
            }
            else{

                if($codeUser['status'] == 0){
                    $user = User::find($codeUser['user_id']);
                    $user->level = 1;
                    $user->save();

                    $notifi = new Notification();
                    $notifi->content = "Tạo thành công người dùng " . $user->email;
                    $notifi->save();

                    $co= Confirm::find($codeUser['id']);
                    $co->delete();
                    return redirect('/login');
                }
                if($codeUser['status'] == 1){
                    $user= User::find($codeUser['user_id']);
                    // $co= Confirm::find($codeUser['id']);
                    // $co->delete();    
                    return view('reset_password_input',['id'=>$user->id,'code'=>$code]);
                }
            }
        }else{
            return redirect('/');
        }
    }

    public function getForgetPassword(){
        return view('forget_password');
    }

    public function postForgetPassword(Request $request){
        $email = $request->email;
        $codeUser=User::where('email', $email)->get();
        if(count($codeUser)!=0){
            $codeUser=  $codeUser[0];
            $code = new Confirm();
            $code->user_id= $codeUser['id'];
            $code_confirm= "" . rand(1000,9999);
            $code->status=1;
            $code->code= $code_confirm;
            $code->save();

            Mail::to($request->email)->send(new RegisteredUser($code_confirm, $codeUser['name']));
            return redirect('/confirm');
         }else{
            $errorComfirmEmail = new MessageBag(['errorComfirmEmail' => 'Không tìm thấy tài khoản!']);
            return redirect()->back()->withInput()->withErrors($errorComfirmEmail);
        }
    }

    public function postReset(Request $request)
    {
        $rules = [
            
            'password'      => 'required|min:6',
            're_password'   => 'required|min:6',
        
        ];
        $messages = [
            
            'password.required' => 'Mật khẩu không được để trống',
            'password.min'      => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            're_password.required'      => 'Không được để trống',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        }else{
            if($request->password != $request->re_password){
                    $err = new MessageBag(['errorPassword' => 'Mật khẩu không khớp']);
                    return redirect()->back()->withErrors($err);
                }
            $co= Confirm::where('code',$request->code)->get();

            if(count($co)!=0){
                $co=$co[0];
                $user= User::find($request->id);
                $user->password= Hash::make($request->password);
                $user->save();
                $notifi = new Notification();
                $notifi->content = "lấy lại mật khẩu người dùng " . $user->email . " thành công";
                $notifi->save();

                $coC= Confirm::find($co['id']);
                $coC->delete();
            }
        return redirect('/login');
        }
        return redirect('/login');
    }
}


