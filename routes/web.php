<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function (){
    return view('welcome');
})->where('any', '.*');
//
// Route::get('test', function() {
//     return 300;
// });
