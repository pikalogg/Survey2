<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\User;

class AdminController extends Controller
{
	public function __construct()
	{
    	$this->middleware('admin');
      date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
    //
   
   public function index(){
      // gioi han hien thi 10
      // $users = User::offset(0)->limit(11)->get();
      // $users = User::where([],[],[])->get(); nhieu dk
      
      // $users = User::where('phone', 'like' ,'037%')->orWhere('name', 'hihi')->get();

      $users = User::all();
      return view('admin/index',['users' => $users]);
   }

   // user
   public function User(Request $request)
   {  
      
      $rules = [
         'name'          => 'required|min:1',
         'password'      => 'required',
         'passwordr'   => 'required',
         'phone'         => 'required',
         'email'         => 'required'
     ];
     $messages = [
         'email.required'    => 'Email không được để trống',
         'password.required' => 'Mật khẩu không được để trống',
         'name.required'     => 'Không được để trống',
         'passwordr.required'      => 'Không được để trống',
         'phone.required'        => 'Không được để trống',
         'name.min'              => 'Tên chứa ít nhất 3 ký tự'
     ];

     $validator = Validator::make($request->all(),$rules,$messages);
     if ($validator->fails()) {
         echo "lỗi";
     } else {$email = $request->input('email');
      $password = $request->input('password');
      $user= User::where('email', '=', $email)->get();
      if (count($user)) {
         return Redirect()->back();
      }
      if ($request->password != $request->passwordr) {
         return Redirect()->back();
      }
      $user = new User();
      $user->name = $request->name;
      $user->email=$email;
      $user->password= Hash::make($password);
      $user->phone= $request->phone;
      // $user->level= 0;

      $user->save();
      return Redirect()->back();}
      
      
  	}

   public function userInformation()
   {
      $users = User::all();
      return view('admin/user',['users' => $users]);
   }

   public function userEdit(Request $request)
   {
      $user = User::find($request->id);
      if($request->name != '' && trim($request->name) != ''){
         $user->name = $request->name;
      }
      if($request->password != '' && trim($request->password) != '' && $request->password = $request->passwordr){
         $user->password = Hash::make($request->password);;
      }
      if($request->phone != '' && trim($request->phone) != ''){
         $user->phone = $request->phone;
      }
      $user->save();
      return Redirect()->back();
   }

   public function userDelete(Request $request)
   {
      User::where('id', $request->id)->delete();
      return Redirect()->back();
   }

   public function userUp2($id){
      $user = User::find($id);
      $user->level = 2;
      $user->save();
      return Redirect()->back();
   }
   public function userUp3($id){
      $user = User::find($id);
      $user->level = 3;
      $user->save();
      return Redirect()->back();
   }
   public function userUp4($id){
      $user = User::find($id);
      $user->level = 4;
      $user->save();
      return Redirect()->back();
   }
   public function userDown($id){
      $user = User::find($id);
      $user->level = 1;
      $user->save();
      return Redirect()->back();
   }

   // end user

   	
}
