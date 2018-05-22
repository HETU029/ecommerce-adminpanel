<?php

/*
 * Frontend Pages Management
 */
Route::group(['namespace' => 'Pages'], function () {
   
/*
* for Display Contact Page
*/
Route::get('/contact','PagesController@getContactPage');

/*
* for Post Contact Page
*/
Route::post('/contact','PagesController@postContactPage');

/*
* for Post Basket Page
*/
Route::get('/basket','PagesController@getBasketPage');

/*
* for Post Basket Page
*/
Route::post('/basket','PagesController@postBasketPage');

/*
* for Display single page
*/
Route::get('pages/{title}',['as'=>'frontend.page','uses'=>'PagesController@getSinglePage']);

/*
* for Display About Page
*/
Route::get('/about','PagesController@getAboutPage');

/*
* for Display About Page
*/
Route::get('/pages','PagesController@getPages');

});
