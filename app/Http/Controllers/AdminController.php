<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Topic;
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
      
      $notifi = Notification::where('status','0')->get();
      $sl = $notifi->count();
      return view('admin/index',['sl'=>$sl ]);
   }


   // Information
   public function userInformation()
   {
      $notifi = Notification::where('status','0')->get();
      $sl = $notifi->count();
      $users = DB::table('users')
               ->where('level', '<' , Auth::user()->level)
               ->where('level' , '!=' , 0)
               ->paginate(4);
      return view('admin/user',['sl'=> $sl, 'users' => $users]);
   }
   public function topicInformation()
   {
      $notifi = Notification::where('status','0')->get();
      $sl = $notifi->count();
      $topics = DB::table('topics')
      ->paginate(10);
      return view('admin/topic',['sl'=>$sl , 'topics'=>$topics]);
   }
   public function respondentInformation()
   {
      $notifi = Notification::where('status','0')->get();
      $sl = $notifi->count();

      $respons = DB::table('topic_response')
      ->paginate(10);

      foreach($respons as $respon){
         $topic = DB::table('topics')->where('id', $respon->topic_id)->first();
         $respon->topic = $topic;
         $respondent = DB::table('respondent')->where('id', $respon->respondent_id)->first();
         $respon->respondent = $respondent;
      }
      return view('admin/respondent',['sl'=>$sl, 'respons'=>$respons]);
   }
   public function notifiInformation()
   {
      $notificount = Notification::where('status','0')->get();
      $sl = $notificount->count();
      $notifis = DB::table('notification')
      ->orderBy('status', 'asc')
      ->orderBy('created_at', 'desc')
      ->paginate(10);

      Notification::where('status','0')->update(['status'=>1]);
      return view('admin/notification', ['sl'=>$sl,'notifis'=>$notifis]);
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
      $user->save();

      $notifi = new Notification();
      $notifi->content = "Tạo thành công người dùng " . $request->email . " bởi admin";
      $notifi->save();

      return Redirect()->back();}
      
      
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

      $notifi = new Notification();
      $notifi->content = "Sửa thành công người dùng " . $request->email . " bởi admin";
      $notifi->save();

      return Redirect()->back();
   }

   public function userDelete(Request $request)
   {
      $notifi = new Notification();
      $user = User::find($request->id);
      $notifi->content = "Xóa thành công người dùng " . $user->email;
      $notifi->save();
      User::where('id', $request->id)->delete();
      
      return Redirect()->back();
   }

   public function userUp2($id){
      $user = User::find($id);
      $user->level = 2;
      $user->save();
      $notifi = new Notification();
      $notifi->content = "Cấp quyền thêm mới cho người dùng " . $user->email ;
      $notifi->save();
      return Redirect()->back();
   }
   public function userUp3($id){
      $user = User::find($id);
      $user->level = 3;
      $user->save();
      $notifi = new Notification();
      $notifi->content = "Cấp quyền sửa cho người dùng " . $user->email ;
      $notifi->save();
      return Redirect()->back();
   }
   public function userUp4($id){
      $user = User::find($id);
      $user->level = 4;
      $user->save();
      $notifi = new Notification();
      $notifi->content = "Cấp quyền xóa cho người dùng " . $user->email ;
      $notifi->save();
      return Redirect()->back();
   }
   public function userDown($id){
      $user = User::find($id);
      $user->level = 1;
      $user->save();
      $notifi = new Notification();
      $notifi->content = "Thu hồi quyền admin của người dùng " . $user->email ;
      $notifi->save();
      return Redirect()->back();
   }

   // end user

   // toppic
   
   // end topic
}
