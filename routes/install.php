<?php 

Route::get("/dx-install", "InstallController@get_install");

Route::post('/dx-install/step/{stepId}', 'InstallController@get_install_step');