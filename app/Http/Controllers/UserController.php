<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use DB;


use Validator;
use App\Comment;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
    }
//
    public function index()
    {
        if (!Auth::check()){
            return Redirect('/login');
        }
        return view('user/index');

    }

    public function topic($id)
    {  

    }
}