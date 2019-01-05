<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2019/1/5
 * Time: 14:22
 */

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'api/v1'], function () {
    Route::get('/', function () {
        return app('app')->version();
    });
});