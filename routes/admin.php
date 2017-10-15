<?php 

$get_urls = config('admin.get_urls');
$post_urls = config('admin.post_urls');
$page_urls = config('admin.page_urls');


// Get routes
Route::get("/dx-admin", "AdminController@view_index");
Route::get("/dx-login", "AdminController@view_login");
Route::get("/dx-admin/custom/{pageName}", "AdminController@view_template")->middleware('admin');

for($urlsCount = 0 ; $urlsCount < count($get_urls) ; $urlsCount++) {

Route::get('/dx-admin/'.$get_urls[$urlsCount]['url'], $get_urls[$urlsCount]['handler'])->middleware('admin');

}



// Post Routes
Route::post("/dx-login", "AdminController@post_login");



