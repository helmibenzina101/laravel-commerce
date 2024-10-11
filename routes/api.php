<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
/*Route::get("/categories",[CategorieController::class,"index"]);
Route::post("/categories",[CategorieController::class,"store"]);
Route::get("/categories/{id}",[CategorieController::class,"show"]);
Route::delete("/categories/{id}",[CategorieController::class,"destroy"]);
Route::put("/categories/{id}", [CategorieController::class, "update"]);
Route::get("/scategories", [ScategorieController::class, "index"]);
Route::post("/scategories",[ScategorieController::class,"store"]);*/
    
Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
    });
    Route::middleware('api')->group(function () {
        Route::resource('scategories', controller: ScategorieController::class);
        });
        Route::get('/scat/{idcat}', [ScategorieController::class,'showSCategorieByCAT']);
        Route::middleware('api')->group(function () {
            Route::middleware('api')->group(function () {
            Route::resource('articles', ArticleController::class);
            });
        Route::get('/articles/art/articlespaginate', [ArticleController::class, 'articlesPaginate']);
        Route::get('/listarticles/{idscat}', [ArticleController::class,'showArticlesBySCAT']);
        Route::get('/articles/art/articlespaginate', [ArticleController::class,
        'articlesPaginate']);
    });