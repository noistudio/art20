<?php


Route::get("/setting/index",[\App\Http\Controllers\admin\Setting::class,"index"])->name("admin.setting.index");
Route::get("/setting/edit/{prefix}",[\App\Http\Controllers\admin\Setting::class,"edit"])->name("admin.setting.edit");
Route::post("/setting/doupdate/{prefix}",[\App\Http\Controllers\admin\Setting::class,"doUpdate"])->name("admin.setting.doupdate");
Route::get("/languages/index",[\App\Http\Controllers\admin\Languages::class,"form"])->name("admin.languages.form");
Route::post("/languages/save",[\App\Http\Controllers\admin\Languages::class,"save"])->name("admin.languages.save");



        //insert_dynamic_routes_heere//
