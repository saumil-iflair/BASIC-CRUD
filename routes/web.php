<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\MultipleimageController;

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
Route::get('/mail', function(){
    \Mail::raw("testing", function($m){
        $m->to("saumil.rana@iflair.com")->subject("testing");
    });
    return "sent";
});

// Route::get('test', function () {
//     return view('test');
// })->middleware('test');

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return view('test');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// Datatables simple and Server side processing.

Route::group(array('middleware'=>'auth'),function(){

route::get('admin/user/simple','admin\UserController@simple');
// Route::post('admin/user/create','admin\UserController@store');
route::post('admin/user/serverside/getdata','admin\UserController@getData');
route::get('admin/user/serverside','admin\UserController@serverSideIndex');

Route::get('admin/user/create','admin\UserController@create')->name('createpost.create');
Route::post('admin/user/create','admin\UserController@store');
route::get('admin/user/serverside/{id}', 'admin\UserController@edit')->name('editpost.edit');
Route::put('admin/user/serverside/{id}', 'admin\UserController@update')->name('updatepost.update');
route::delete('admin/user/serverside/{id}', 'admin\UserController@destroy')->name('deletepost.destroy');




// USER MANEGMENT

   route::resource('admin/user','admin\UserController');

   //HasRole

   Route::resource('admin/roles','admin\RolesController');

// Route::get('admin/roles/create','admin\RolesController@create')->name('admin.roles.create');
// Route::post('admin/roles/store','admin\RolesController@store');
// Route::get('admin/roles/{id}', 'admin\RolesController@index')->name('admin.roles');
// route::delete('admin/roles/{id}', 'admin\RolesController@destroy')->name('admin.roles.destroy');


// // Route::get('admin/rolemanagement/{id}', 'admin\RoleController@show')->name('posts.show');
// route::get('admin/image/{id}', 'admin\MutlipleImageController@edit')->name('imagepost.edit');
// Route::put('admin/image/{id}', 'admin\MutlipleImageController@update')->name('imagepost.update');
// route::delete('admin/image/{id}', 'admin\MutlipleImageController@destroy')->name('imagepost.destroy');


// Role Management

// route::get('admin/rolemanagement/', 'admin\RoleController@simple');
route::post('admin/rolemanagement/index/getdata','admin\RoleController@getData');
route::get('admin/rolemanagement/','admin\RoleController@serverSideIndex');

// Route::get('admin/rolemanagement/', 'admin\RoleController@create')->name('posts.create');
// route::resource('admin/rolemanagement','admin\RoleController');

Route::get('admin/rolemanagement/create','admin\RoleController@create')->name('posts.create');
Route::post('admin/rolemanagement/create','admin\RoleController@store');
Route::get('admin/rolemanagement/{id}', 'admin\RoleController@index')->name('posts.index');
// Route::get('admin/rolemanagement/{id}', 'admin\RoleController@show')->name('posts.show');
route::get('admin/rolemanagement/{id}', 'admin\RoleController@edit')->name('posts.edit');
Route::put('admin/rolemanagement/{id}', 'admin\RoleController@update')->name('posts.update');
route::delete('admin/rolemanagement/{id}', 'admin\RoleController@destroy')->name('posts.destroy');




route::post('admin/childimg/serverside/getdata','admin\ChildImgController@getData');
route::get('admin/childimg/serverside','admin\ChildImgController@serverSideIndex');


Route::get('admin/childimg/create','admin\ChildImgController@create')->name('childcreate.create');
Route::post('admin/childimg/create','admin\ChildImgController@store');
Route::get('admin/childimg/{id}', 'admin\ChildImgController@index')->name('childindex.index');
// Route::get('admin/rolemanagement/{id}', 'admin\RoleController@show')->name('posts.show');
route::get('admin/childimg/{id}', 'admin\ChildImgController@edit')->name('childedit.edit');
Route::put('admin/childimg/{id}', 'admin\ChildImgController@update')->name('childupdate.update');
route::delete('admin/childimg/imgdelete/{id}', 'admin\ChildImgController@delete')->name('childdelete.delete');


route::delete('admin/childimg/{id}', 'admin\ChildImgController@destroy')->name('childdelete.destroy');


// Route::post('allposts', 'PostController@allPosts' )->name('allposts');

// route::resource('admin/user','admin\UserController');


// Admin profile and Change password

route::resource('admin/password','admin\PasswordController');

// Route::resource('admin/multipleimage','admin\MutlipleImageController');


// Image upload Intervention library om database

route::post('admin/image/serverside/getdata','admin\MutlipleImageController@getData');
route::get('admin/image/serverside','admin\MutlipleImageController@serverSideIndex');


Route::get('admin/image/create','admin\MutlipleImageController@create')->name('imagepost.create');
Route::post('admin/image/create','admin\MutlipleImageController@store');
Route::get('admin/image/{id}', 'admin\MutlipleImageController@index')->name('imagepost.index');
// Route::get('admin/rolemanagement/{id}', 'admin\RoleController@show')->name('posts.show');
route::get('admin/image/{id}', 'admin\MutlipleImageController@edit')->name('imagepost.edit');
Route::put('admin/image/{id}', 'admin\MutlipleImageController@update')->name('imagepost.update');
route::delete('admin/image/{id}', 'admin\MutlipleImageController@destroy')->name('imagepost.destroy');


// Route::resource('admin/image','admin\MutlipleImageController');

// Multiple Image upload on Database

// Route::resource('admin/multipleimage','admin\MultipleImage');



// Route::get('multiple-image', 'ImageController@index');
// Route::post('multiple-save', 'ImageController@save');


//Jquery validation

Route::get('validation','FormController@validation');
Route::post('validation','FormController@validationPost');


//Multiple image


// Change Password

Route::resource('admin/password', 'admin\PasswordController');

// Admin Profile name change

// Route::resource('admin/profile','admin\ProfilenameController');
Route::get('admin/profile/create','admin\ProfilenameController@edit')->name('user.edit');
Route::post('admin/profile/','admin\ProfilenameController@update')->name('user.update');


Route::get('export', 'admin\ChildImgController@export')->name('export');
Route::get('importExportView', 'admin\ChildImgController@importExportView');

Route::get('import',function(){
  return view('import');
});



Route::post('import', 'admin\ChildImgController@import')->name('import');

Route::get('exportpdf', 'admin\ChildImgController@exportPDF')->name('export');


// Register module with datatables

Route::resource('admin/registration','admin\RegisterController');

Route::post('admin/registration/index', 'admin\RegisterController@getData')->name('admin.registration.index');
Route::post('registerimport', 'admin\RegisterController@import')->name('registerimport');

Route::get('registerimport',function(){
  return view('admin/registration/import');
});
Route::get('exportpdf', 'admin\RegisterController@exportPDF')->name('export');

Route::get('admin/registration/{id}', 'admin\RegisterController@destroy');
Route::get('admin/registration/multipledelete', 'admin\RegisterController@massremove')->name('admin.registration.multipledelete');



//Roles permission 31-03-2021

Route::get('exportrole', 'admin\RolesController@export')->name('exportrole');

Route::get('registerimport1',function(){
  return view('admin/rolemanagement/import');
});
Route::post('registerimport1', 'admin\RolesController@import')->name('registerimport');
Route::get('exportpdf123', 'admin\RolesController@exportPDF123')->name('exportpdf123');


Route::any('contractors/export','admin\RolesController@exportContractor');

// Route::get('admin/{registration}/edit', 'admin\RegisterController@edit')->name('admin.registration.edit');
// Route::post('admin/registration/delete', 'admin\RegisterController@destroy')->name('admin.registration.delete');

//middleware
Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
    });


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
