<?php
Route::group(['middleware'=>'web'],function (){
    Route::group(['prefix'=>'pager'],function (){
        Route::get('/{tag}','PagerController@show')->name('pager@show');
    });
});


/**
 * function autoPermission 登录用户就有权限
 * function link 展示页面所关联的权限 参数填关联的route的name
 * function permissionName 权限名称
 */