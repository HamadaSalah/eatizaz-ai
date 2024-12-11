<?php

use App\Http\Controllers\FileInformationController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;

Route::post('upload', [FileUploadController::class, 'upload']);

Route::post('save-files-info', [FileInformationController::class, 'infoGathering']);

Route::get('files-info', [FileInformationController::class, 'getFilesInfo']);
