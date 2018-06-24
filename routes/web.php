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

https://appdividend.com/2018/02/23/laravel-5-6-crud-tutorial/
https://scotch.io/tutorials/simple-laravel-crud-with-resource-controllers
https://itsolutionstuff.com/post/laravel-56-crud-application-for-starterexample.html
https://www.5balloons.info/tutorial-simple-crud-operations-in-laravel-5-5/
http://www.expertphp.in/article/laravel-5-5-crud-create-read-update-delete-example-from-scratch
https://scqq.blogspot.com/2016/10/laravel-5-crud-using-ajax-modals.html
https://scqq.blogspot.com/2017/12/laravel-55-ajax-create-like-dislike.html

https://scqq.blogspot.com/2016/12/laravel-5-tutorial-image-upload-resize.html
http://image.intervention.io/getting_started/installation#laravel


http://www.expertphp.in/article/laravel-5-ajax-crud-example-to-build-web-application-without-page-refresh

https://itsolutionstuff.com/post/laravel-5-ajax-crud-with-pagination-example-and-demo-from-scratchexample.html

https://vegibit.com/laravel-ajax-crud-tutorial/
https://jmkleger.com/post/ajax-crud-for-laravel-5-4

https://laravel-news.com/your-first-laravel-application



---------------------------- LARAVEL --------------------------
CREATE LARAVEL PROJECT :
composer create-project laravel/laravel --prefer-dist projectname (Will create last version)
composer create-project laravel/laravel=5.2.* --prefer-dist projectname (Will create with specified version)

---------------------------- MODEL ----------------------------
CREATE MODEL :
php artisan make:model XXXXX
example : php artisan make:model Post

CREATE MODEL & CONTROLLER :
php artisan make:model -c XXXXX
example : php artisan make:model -c Post

CREATE MODEL & CONTROLLER (CRUD) :
php artisan make:model -c -r XXXXX
example : php artisan make:model -c -r Post

CREATE MODEL & FACTORY :
php artisan make:model -f XXXXX
example : php artisan make:model -f Post

CREATE MODEL & MIGRATION :
php artisan make:model -m XXXXX
example : php artisan make:model -m Post

CREATE MODEL, CONTROLLER, & MIGRATION :
php artisan make:model -c -m XXXXX
example : php artisan make:model -c -m Post

CREATE MODEL, CONTROLLER (CRUD), & MIGRATION :
php artisan make:model -c -r -m XXXXX
example : php artisan make:model -c -r -m Post

CREATE MODEL, CONTROLLER, FACTORY & MIGRATION :
php artisan make:model -a XXXXX
example : php artisan make:model -a Post

For detail can see on : php artisan make:model -h

---------------------------- CONTROLLER -----------------------
CREATE CONTROLLER :
php artisan make:controller XXXXXController
example : php artisan make:controller PostController

CREATE CONTROLLER (CRUD) :
php artisan make:controller -r XXXXXController
example : php artisan make:controller -r PostController

CREATE CONTROLLER WITH USE MODEL :
php artisan make:controller --model=YYYYY XXXXXController
example : php artisan make:controller --model=Post PostController

php artisan make:controller -r --model=YYYYY XXXXXController
example : php artisan make:controller -r --model=Post PostController

---------------------------- FACTORY --------------------------
CREATE FACTORY :
php artisan make:factory XXXXXFactory
example : php artisan make:factory PostFactory

CREATE FACTORY :
php artisan make:factory --model=YYYYY XXXXXFactory
example : php artisan make:factory --model=Post PostFactory

---------------------------- MIGRATION ------------------------
CREATE MIGRATION :
php artisan make:migration create_XXXXX_table --create=XXXXX
example : php artisan make:migration create_posts_table --create=posts

---------------------------- SEED -----------------------------
CREATE SEED :
php artisan make:seeder XXXXXTableSeeder
example : php artisan make:seeder PostsTableSeeder

-------------------------------------------------------------

Execute Migration :
php artisan migrate

Rollback Migration :
php artisan migrate:rollback

Execute Seed :
php artisan db:seed
Note : Put syntax $this->call(NameTableSeeder::class); on database/seeds/DatabaseSeeder.php for calling seeder file

Execute Migration & Seed :
php artisan migrate:refresh --seed

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lang', function () {
	return __('messages.welcome');
});

Route::get('/lang1', function () {
	return trans('messages.welcome');
});

Route::resource('passports','PassportController');
Route::resource('nerds', 'NerdController');
Route::resource('products','ProductController');
Route::resource('tasks', 'TaskController');
Route::resource('members','MemberController');

Route::group(['middleware' => ['web']], function() {
  Route::resource('blog','BlogController');
  Route::post ( '/editItem', 'BlogController@editItem' );
  Route::post ( '/addItem', 'BlogController@addItem' );
  Route::post ( '/deleteItem', 'BlogController@deleteItem' );
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post', 'PostController@index');
Route::post('/like','PostController@postLikePost')->name('like');

Route::get('resizeImage',['as'=>'getimage','uses'=>'ImagesController@getImage']);
Route::post('resizeImage',['as'=>'postimage','uses'=>'ImagesController@postImage']);

Route::get('manage-item-ajax', 'ItemAjaxController@manageItemAjax');
Route::resource('item-ajax', 'ItemAjaxController');


//--LOAD THE VIEW--//
Route::get('/link', function () {
    $links = App\Link::all();
    return view('links.laracrud')->with('links', $links);
}); 
//--CREATE a link--//
Route::post('/links', function (Request $request) {
    $link = App\Link::create($request->all());
    return Response::json($link);
}); 
//--GET LINK TO EDIT--//
Route::get('/links/{link_id?}', function ($link_id) {
    $link = App\Link::find($link_id);
    return Response::json($link);
}); 
//--UPDATE a link--//
Route::put('/links/{link_id?}', function (Request $request, $link_id) {
    $link = App\Link::find($link_id);
    $link->url = $request->url;
    $link->description = $request->description;
    $link->save();
    return Response::json($link);
}); 
//--DELETE a link--//
Route::delete('/links/{link_id?}', function ($link_id) {
    $link = App\Link::destroy($link_id);
    return Response::json($link);
});