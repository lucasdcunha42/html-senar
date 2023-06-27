<?php

use App\Http\Controllers\Helpers\ImageHelperController;
use App\Http\Controllers\Helpers\DownloadController;

Route::get('/image', [ImageHelperController::class, 'getImage'])
    ->name('image');

Route::get('download-file', [DownloadController::class, 'download'])
    ->name('download');
