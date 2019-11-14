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
            return Redirect('/home');
        }
        return view('user/index');

    }

    public function checkout()
    {
        return view('user/checkout');
    }

    public function survey($id)
    {
    //     $product_asType = DB::table('products')
    // ->join('images', 'products.id', '=', 'images.product_id')
    // ->where('products.brand_id', '=', $type)
    // ->paginate(9);
    //     $tyPe = DB::table('brands')->where('id', '=', $type)->first();
    //     $type_CheckBox = DB::table('brands')->get();
    //     $topSelling_product = DB::table('products')
    // ->join('images', 'products.id', '=', 'images.product_id')
    // ->where('products.sale', '=', '1')
    // ->orderBy('products.price', 'DESC')
    // ->offset(0)
    // ->limit(5)
    // ->get();
        // return view('user/store', compact('product_asType', 'tyPe', 'type_CheckBox', 'topSelling_product'));
    }
}