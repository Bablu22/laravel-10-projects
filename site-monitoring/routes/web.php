<?php

use App\Events\CheckSite;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {

    $urls = \App\Models\Url::all();
    $urls->each(function ($url) {
        event(new CheckSite($url));
    });
});