<?php

/*
 * Blogs Management
 */
Route::group(['namespace' => 'Blogs'], function () {

/*
* for display single blog
*/
Route::get('blogs/{slug}',['as'=>'frontend.blog.single','uses'=>'BlogController@getSingleBlog'])
->where('slug','[\w\d\-\_]+');

/*
* for display all blogs in main page
*/
Route::get('blogs',['uses'=>'BlogController@getIndex','as' =>'frontend.blog.index']);

/*
* for display Home Page
*/
Route::get('/home',['uses'=>'BlogController@getIndex','as' =>'frontend.blog.index']);

});
