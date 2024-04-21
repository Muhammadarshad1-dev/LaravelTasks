<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('admin.login'));
});

// Auth::routes();






Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Auth','controller' => 'AdminAuthController'],function(){
    Route::get('/login','showLoginForm')->name('login');
    Route::post('/login','login')->name('login');
    Route::post('/logout','logout')->name('logout');
});




Route::prefix('admin')->as('admin.')->middleware('auth:admin')->namespace('App\Http\Controllers\Administrator')->group(function(){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/profile', 'DashboardController@profile')->name('profile');
    Route::post('/update-profile', 'DashboardController@update_profile')->name('update_profile');
    Route::post('/change-password', 'DashboardController@change_password')->name('change_password');

    // this is employe controller route
    Route::get('/allempoye','EmployeController@allempoye')->name('allempoye');
    Route::get('/employe','EmployeController@employe')->name('employe');
    Route::post('/addemploye','EmployeController@addemploye')->name('addemploye');
    Route::get('/delete/{deid}','EmployeController@delete')->name('delete');
    Route::get('/editemploye/{empid}','EmployeController@editemploye')->name('editemploye');


    // this is students controller route
    Route::get('/student/','StudentController@student')->name('student');
    Route::get('/allstudent','StudentController@allstudent')->name('allstudent');
    Route::post('/addstudents','StudentController@addstudents')->name('addstudents');
    Route::get('/editstudents/{seid}','StudentController@editstudents')->name('editstudents');
    Route::get('/deletestudents/{did}','StudentController@deletestudents')->name('deletestudents');



    // this is member controller
    Route::get('/member','MemberController@member')->name('member');
    Route::get('/allmember','MemberController@allmember')->name('allmember');
    Route::post('/addmember','MemberController@addmember')->name('addmember');
    Route::post('/allmember','MemberController@allmember')->name('allmember');
    Route::get('/deletemember/{dmid}','MemberController@deletemember')->name('deletemember');
    Route::get('/editmember/{meid}','MemberController@editmember')->name('editmember');



    // this is blog controller delete_blog_img
    Route::get('/blog','BlogController@blog')->name('blog');
    Route::post('/addblog','BlogController@addblog')->name('addblog');
    Route::get('/allblog','BlogController@allblog')->name('allblog');
    Route::get('/editblog/{bid}','BlogController@editblog')->name('editblog');
    Route::get('/delete_single_blog_img/{did}','BlogController@delete_single_blog_img')->name('delete_single_blog_img');
    Route::get('/delete_blog/{dbid}','BlogController@delete_blog')->name('delete_blog');
    Route::get('/view_blog/{vbid}','BlogController@view_blog')->name('view_blog');


    // This is Category Controller
    Route::get('/category','CategoryController@category')->name('category');
    Route::post('/addcategory','CategoryController@addcategory')->name('addcategory');
    Route::get('/allcategory','CategoryController@allcategory')->name('allcategory');
    Route::get('/delete_category/{cid}','CategoryController@delete_category')->name('delete_category');
    Route::get('/edit_categoy/{cid}','CategoryController@edit_categoy')->name('edit_categoy');
    // Route::get('/filter_category','CategoryController@filter_category')->name('filter_category');

});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

