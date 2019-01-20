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

Route::get('/', 'SiteController@index')->name('site.index');
Route::get('/post/{slug}', 'SiteController@show')->name('site.show');
Route::get('/categories/{category}', 'SiteController@showCategory')->name('categories.show');
Route::get('/tag/{tag}', 'SiteController@showTag')->name('tag.show');
/*Route::get('/results', function() {
    $posts = Post::where('title', 'like', '%' . request('query') . '%')->get();

    return view('results')->with('posts', $posts)
                                    ->with('title', 'Search results: ' . request('query'))
                                    ->with('categories', Category::take(5)->get())
                                    ->with('setting', Setting::first())
                                    ->with('query', request('query'));
});*/
Route::get('/results', 'SiteController@search');


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/dashboard', 'HomeController@index')->name('home');

    Route::get('/categories', 'CategoriesController@index')->name('categories.index');
    Route::get('/categories/create', 'CategoriesController@create')->name('categories.create');
    Route::post('/categories/store', 'CategoriesController@store')->name('categories.store');
    Route::get('/categories/{category}/edit', 'CategoriesController@edit')->name('categories.edit');
    Route::patch('/categories/{category}/update', 'CategoriesController@update')->name('categories.update');
    Route::delete('/categories/{category}/destroy', 'CategoriesController@destroy')->name('categories.destroy');

    Route::get('/posts', 'PostsController@index')->name('posts.index');
    Route::get('/posts/create', 'PostsController@create')->name('posts.create');
    Route::post('/posts/store', 'PostsController@store')->name('posts.store');
    Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
    Route::put('/posts/{post}/update', 'PostsController@update')->name('posts.update');
    Route::get('/posts/trashed', 'PostsController@trashed')->name('posts.trashed');
    Route::delete('/posts/{post}/destroy', 'PostsController@destroy')->name('posts.destroy');
    Route::get('/posts/{post}/kill', 'PostsController@kill')->name('posts.kill');
    Route::get('/posts/{id}/restore', 'PostsController@restore')->name('posts.restore');

    Route::resource('/tags', 'TagsController');
    Route::resource('/users', 'UsersController');

    Route::group(['middleware' => 'admin'], function() {
        Route::patch('/users/{id}/admin', 'UsersController@admin')->name('users.admin');
        Route::patch('/users/{id}/notAdmin', 'UsersController@notAdmin')->name('users.not_admin');
    });

    Route::get('/profile', 'ProfilesController@index')->name('users.profile');
    Route::put('/profile/update', 'ProfilesController@update')->name('users.profile.update');

    Route::get('/settings', 'SettingsController@index')->name('settings.index');
    Route::put('/settings/update', 'SettingsController@update')->name('settings.update');
});
