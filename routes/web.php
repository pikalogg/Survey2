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
            echo $request->href;
        });
        Route::get('/', 'AdminController@index');
        Route::get('/index', 'AdminController@index');
        Route::group(['prefix'=>'/user'],
            function(){
                Route::get('/delete', 'AdminController@userDelete');
                Route::get('/edit', 'AdminController@userEdit');
                Route::get('/add', 'AdminController@user');
                Route::get('/up2/{id}', 'AdminController@userUp2');
                Route::get('/up3/{id}', 'AdminController@userUp3');
                Route::get('/up4/{id}', 'AdminController@userUp4');
                Route::get('/down/{id}', 'AdminController@userDown');

            }
        );
        //en user
        //information
        Route::get('/user', 'AdminController@userInformation');
        Route::get('/topic', 'AdminController@topicInformation');
        Route::get('/respondent', 'AdminController@respondentInformation');
        Route::get('/notification', 'AdminController@notifiInformation');
        //end inf
    }
);
Route::get('/form/{link}', 'UserController@getTopic');
Route::post('/form/{link}', 'UserController@postTopic');

// test

