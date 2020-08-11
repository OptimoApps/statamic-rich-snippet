<?php
/*
 * *
 *  *  * Copyright (C) OptimoApps - All Rights Reserved
 *  *  * Unauthorized copying of this file, via any medium is strictly prohibited
 *  *  * Proprietary and confidential
 *  *  * Written by Sathish Kumar(satz) <info@optimoapps.com>
 *  *
 *
 */

Route::middleware('web')->group(function () {
    Route::get('/optimoapps/richsnippet/', 'RichSnippetController@index')->name('optimoapps.rich-snippet.index');
    Route::post('/optimoapps/richsnippet/', 'RichSnippetController@update')->name('optimoapps.rich-snippet.update');
});
