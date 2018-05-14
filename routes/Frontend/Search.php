<?php

Route::group(['namespace' => 'Searches'], function () {



/*
* for Search all blogs by tags
*/
 Route::get('/search/tag/{tag}','SearchesController@findByTag');

/*
* for Search all blogs by tags
*/
Route::get('/search/category/{category}','SearchesController@findByCategory');

/*
* for Search all blogs by Month & year
*/
Route::get('/search/{month}/{year}','SearchesController@findByArchive');


/*
* for Search all blogs by keyword
*/
Route::get('search/{s?}', 'SearchesController@findByKeyword')->where('s', '[\w\d]+');


});
