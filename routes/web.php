<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', 'UserController@index');

Route::get('/home', function(){
	return view('welcome');
});
Route::get('/checkout', 'UserController@checkout');

Route::get('/login','AccountController@getLogin');

Route::post('/login','AccountController@postLogin')->name('login');

Route::get('/register', 'AccountController@getRegister');

Route::post('/register', 'AccountController@postRegister')->name('register');

Route::get('/forget_password','AccountController@getForgetPassword');

Route::post('/forget_password','AccountController@postForgetPassword')->name('forget');

Route::post('/password_reset','AccountController@postReset')->name('reset');

Route::get('confirm', function(){
	return view('confirm_email');
});

Route::get('confirmuser/{code}', 'AccountController@confirmUser');

Route::get('/logout',function(){
	Auth::logout();
	return redirect('/');
});
Route::post('/logout',function(){
	Auth::logout();
	return redirect('/');
})->name('logout');

Route::get('/comment/{id}', 'UserController@addComment')->name('comment');

Route::get('/account', 'UserController@getAccount');

Route::group(['prefix'=>'/admin', 'middleware'=> 'admin'],
	function(){
        Route::get('/search', function(Request $request){
            echo $request->textsearch . '<br>';
            echo substr(url()->current(),28);
        });
        Route::get('/', 'AdminController@index');
        Route::get('/index', 'AdminController@index');
        Route::group(['prefix'=>'/user'],
            function(){
                Route::get('/delete/{id}', 'AdminController@userDelete');
                Route::post('/edit', 'AdminController@userEdit');
                Route::post('/', 'AdminController@user');
            }
        );
        Route::group(['prefix'=>'information'],
            function(){
                Route::get('/user', 'AdminController@userInformation');


            }
        );
    }
);


// test

