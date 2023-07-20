<?php

use App\Http\Controllers\GeneratedIDController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TemplateController;
// use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/id_template/{filename}', function ($filename) {
//     $path = public_path('id_template/' . $filename);

//     if (file_exists($path)) {
//         $file = file_get_contents($path);
//         return response($file, 200)->header('Content-Type', 'image/png');
//     } else {
//         abort(404);
//     }
// })->where('filename', '.*');

Route::post('/',[LoginController::class, 'index']);
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/generateId',[ModuleController::class, 'generateID']);
Route::post('/previewID',[ModuleController::class, 'previewID']);

// read data
Route::get('/students',[StudentController::class, 'students']);
Route::post('/save-cropped-image',[StudentController::class, 'get_Profile']);

// template
Route::get('/image-templates', [TemplateController::class, 'getImageTemplates']);
Route::get('/image-templates-coord', [TemplateController::class, 'getTemplateCoordinates']);
Route::post('/save-template', [TemplateController::class, 'saveImageTemplates']);

// student generated ID
Route::post('/get-generated-id', [GeneratedIDController::class, 'getGeneratedStID']);

// get images save in public folder
Route::get('/get-images', [ImageController::class, 'getImages']);
Route::get('/get-signatures', [ImageController::class, 'getSignatures']);
// upload images template
Route::post('/upload-images', [ImageController::class, 'handleUpload']);
Route::post('/save-signature-image', [ImageController::class, 'handleUploadSignature']);

// get id generated
Route::get('/id-generated', [ImageController::class, 'getGeneratedId']);
