<?php

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth:admin']], function () {
    Route::get('/extensionsvalley/pages/addpages', [
        'middleware' => 'acl:add',
        'name' => 'Add Pages',
        'as' => 'extensionsvalley.admin.addpages',
        'uses' => 'ExtensionsValley\Pages\PagesController@addPages',
    ]);
    Route::get('/extensionsvalley/pages/editpages/{id}', [
        'middleware' => 'acl:edit',
        'name' => 'Edit Pages',
        'as' => 'extensionsvalley.admin.editpages',
        'uses' => 'ExtensionsValley\Pages\PagesController@editPages',
    ]);
    Route::get('/extensionsvalley/pages/viewpages/{id}', [
        'middleware' => 'acl:view',
        'name' => 'view Pages',
        'as' => 'extensionsvalley.admin.viewpages',
        'uses' => 'ExtensionsValley\Pages\PagesController@viewPages',
    ]);
    Route::post('/extensionsvalley/pages/savepages', [
        'middleware' => 'acl:add',
        'name' => 'Save Pages',
        'as' => 'extensionsvalley.admin.savepages',
        'uses' => 'ExtensionsValley\Pages\PagesController@savePages',
    ]);
    Route::post('/extensionsvalley/pages/updatepages', [
        'middleware' => 'acl:edit',
        'name' => 'Update Pages',
        'as' => 'extensionsvalley.admin.updatepages',
        'uses' => 'ExtensionsValley\Pages\PagesController@updatePages',
    ]);
});
