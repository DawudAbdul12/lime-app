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

/*

|
|
|
|
|   FRONTEND ROUTES
|
|
|
|
|

*/
Route::get('/','publicController@index');// index
Route::get('/index','publicController@index'); // index
Route::get('/skillset','publicController@skillset'); // skillset
Route::get('/honeys','publicController@phsychos'); // honeys
Route::get('/contact','publicController@contact'); // contact 

Route::get('/juice','publicController@juice'); // juice 
Route::get('/juice/{slug}','publicController@juice_category'); // juice/ category
Route::get('/juice/{category}/{subcategory}','publicController@juice_subcategory'); // juice/ sub category
Route::get('/project/{slug}','publicController@single_project'); // for single project



// Route::get('/product','publicController@product'); // products
// Route::get('/product/{slug}','publicController@single_product'); // for single product
// Route::get('/news','publicController@blog'); // for single single news
// Route::get('/news/{slug}','publicController@single_news'); // for single single news
// Route::get('/gallery','publicController@gallery');//gallery 
// Route::get('/album/{slug}','publicController@gallery_single'); // for single single aLBUM
// Route::get('/team','publicController@team');

/*

|
|
|
|
|   BACKEND ROUTES
|
|
|
|
|

*/
// LOGIN
Auth::routes();
Route::get('/admin','adminController@index')->name('admin');
Route::get('/admin/login','adminController@index')->name('admin/login');
// DASHBOARD
Route::resource('/admin/dashboard','dashboardController');
// BLOG CATEGORY
Route::resource('/admin/blog/categories','blogCategoryController');
// BlOG
Route::resource('/admin/blog','blogController');
// TEAM 
Route::resource('/admin/team','teamController');
// PRODUCT CATEGORY
Route::resource('/admin/project/categories','productCategoryController');
// PRODUCT
Route::post('/admin/project/delete/gallery','productController@delete_img');
Route::resource('/admin/project','productController');
// ALBUM 
Route::post('/admin/album/delete/gallery','albumController@delete_img');
Route::resource('/admin/album','albumController');
// SLIDER 
Route::resource('/admin/slider','sliderController');
// BRAND
Route::resource('/admin/brand','brandController');
// USER
Route::get('/admin/user/changepassword','userController@changepassword');
Route::post('/admin/user/updatepassword', 'UserController@updatepassword');
Route::resource('/admin/user','userController');