<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\User;

class AdminController extends Controller
{
	public function __construct()
	{
    	// $this->middleware('admin');
      date_default_timezone_set('Asia/Ho_Chi_Minh');
	}
    //
   
   public function index(){
      if (!Auth::check()){
         return Redirect('/home');
      }
      $user = Auth::user();
      if ($user->level == 1) 
      return Redirect('/');
      $users = User::all();
      return view('admin/index',['users' => $users]);
   }

   // user
   public function User(Request $request)
   {  
      $rules = [
         'name'          => 'required',
         'password'      => 'required',
         're_password'   => 'required',
         'phone'         => 'required|regex:/(0)[0-9]{9}/',
         'email'         => 'required'
      ];
      $validator = Validator::make($request->all(),$rules);
      if($validator->fails()) {
            
      }else{
         $email = $request->input('email');
         $password = $request->input('password');
         $user= User::where('email', '=', $email)->get();
         if (count($user)) {
            return Redirect()->back();
         }
         if ($request->password != $request->re_password) {
            return Redirect()->back();
         }
         $user = new User();
         $user->name = $request->name;
         $user->email=$email;
         $user->password= Hash::make($password);
         $user->phone= $request->phone;
         // $user->level= 0;

         $user->save();
      }
      return Redirect()->back();
      
  	}

   public function userInformation()
   {
      if (!Auth::check()){
         return Redirect('/home');
      }
      $user = Auth::user();
      if ($user->level == 1) 
      return Redirect('/');
      $users = User::all();
      return view('admin/index',['users' => $users]);
   }

   public function userEdit(Request $request)
   {
      $user = User::find($request->id);
      if($request->name != '' && trim($request->name) != ''){
         $user->name = $request->name;
      }
      if($request->email != '' && trim($request->email) != ''){
         $user->email = $request->email;
      }
      if($request->password != '' && trim($request->password) != ''){
         $user->password = Hash::make($request->password);;
      }
      if($request->phone != '' && trim($request->phone) != ''){
         $user->phone = $request->phone;
      }
      $user->save();
      return Redirect()->back();
   }

   public function userDelete($id)
   {
      User::where('id', $id)->delete();
      return Redirect()->back();
   }

   // end user

   	
}
