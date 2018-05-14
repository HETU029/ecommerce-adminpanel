<?php
/**
 * Product Category Management
 *
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    
    Route::group( ['namespace' => 'ProductCategories'], function () {
        Route::resource('productcategories', 'ProductcategoriesController');
        //For Datatable
        Route::post('productcategories/get', 'ProductcategoriesTableController')->name('productcategories.get');
    });
    
});