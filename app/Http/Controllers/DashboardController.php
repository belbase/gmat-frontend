<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
/**
 *
 */
class DashboardController extends Controller
{
  public static function routes(){
    // Route::group(['prefix' => 'dashboard'], function() {
    //       Route::get('/{id?}', ['as' => 'product.index', 'uses' => 'ProductController@index']);
    //   });
      \Route::get('/dashboard/login','DashboardController@login');
      \Route::post('/dashboard/login', ['as'=>'admin.auth','uses'=>'AdminLoginController@adminAuth']);
      \Route::group(['middleware' => ['admin'],],function(){
        \Route::any('/dashboard','DashboardController@index')->name('dashboard.index');
        \Route::any('/dashboard/logout','DashboardController@logout');
        \Route::post('/dashboard/question/add','Dashboard\QuestionController@add');
        \Route::post('/dashboard/question/store','Dashboard\QuestionController@store');
        \Route::post('/dashboard/question/update','Dashboard\QuestionController@update');
        \Route::post('/dashboard/question/delete','Dashboard\QuestionController@delete');
        \Route::get('/dashboard/question/{db}','Dashboard\QuestionController@index');
        \Route::get('/dashboard/review/{db}','Dashboard\ReviewController@index');
        \Route::post('/dashboard/review/change','Dashboard\ReviewController@change');
        \Route::get('/dashboard/upload',function(){
          return view('content');
        });
        \Route::post('/dashboard/question/edit','Dashboard\QuestionController@edit');
        \Route::post('/dashboard/upload/image','Dashboard\ResourceController@uploadImages');
      });

  }
  public function index()
  {
    return view('dashboard.index')->with([
      //
      'title'=>'Admin Pannel',
    ]);
  }
  public function login()
  {
    return view('dashboard.login')->with([
      'title'=>'Admin Pannel',
    ]);
  }
  public function logout(){
    Auth::guard('admin')->logout();
    return redirect('dashboard');
  }
}

?>
