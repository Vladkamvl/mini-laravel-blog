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

Route::get('/', function (){
    return redirect()->route('blog.posts.index');
})->name('home');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function(){
    Route::resource('posts', 'PostController')->names('blog.posts');
});

//Admin
$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix' => 'admin/blog',
];

Route::group($groupData, function(){

    //BlogCategory routes
    $categoryMethods = ['index', 'update', 'store', 'edit', 'create'];
    Route::resource('categories', 'CategoryController')
        ->only($categoryMethods)
        ->names('admin.blog.categories');

    //BlogPost routes
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('admin.blog.posts');
});
