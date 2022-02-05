<?php

Route::group(['prefix' => 'filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
$config = array_merge(config('translation-manager.admin_route'), ['namespace' => 'Barryvdh\TranslationManager']);
Route::group($config, function($router) {
    $router->get('/', 'Controller@getIndex')->name('admin.trans.index');
 });
