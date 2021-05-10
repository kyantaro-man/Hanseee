<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function() {
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

  Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index');
  Route::get('/categories/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('categories.create');
  Route::post('/categories', [App\Http\Controllers\CategoriesController::class, 'store'])->name('categories.store');

  Route::get('/categories/{category}/problems', [App\Http\Controllers\ProblemsController::class, 'index'])->name('problems.index');
  Route::get('/categories/{category}/problems/create', [App\Http\Controllers\ProblemsController::class, 'create'])->name('problems.create');
  Route::post('/categories/{category}/problems', [App\Http\Controllers\ProblemsController::class, 'store'])->name('problems.store');
  Route::get('/categories/{category}/problems/{problem}/edit', [App\Http\Controllers\ProblemsController::class, 'edit'])->name('problems.edit');
  Route::put('/categories/{category}/problems/{problem}', [App\Http\Controllers\ProblemsController::class, 'update'])->name('problems.update');
  Route::delete('/categories/{category}/problems/{problem}', [App\Http\Controllers\ProblemsController::class, 'destroy'])->name('problems.destroy');

  Route::get('/categories/{category}/problems/{problem}/steps', [App\Http\Controllers\StepsController::class, 'index'])->name('steps.index');
  Route::get('/categories/{category}/problems/{problem}/steps/create', [App\Http\Controllers\StepsController::class, 'create'])->name('steps.create');
  Route::post('/categories/{category}/problems/{problem}/steps', [App\Http\Controllers\StepsController::class, 'store'])->name('steps.store');
  Route::get('/categories/{category}/problems/{problem}/steps/{step}/edit', [App\Http\Controllers\StepsController::class, 'edit'])->name('steps.edit');
  Route::put('/categories/{category}/problems/{problem}/steps/{step}', [App\Http\Controllers\StepsController::class, 'update'])->name('steps.update');
  Route::delete('/categories/{category}/problems/{problem}/steps/{step}', [App\Http\Controllers\StepsController::class, 'destroy'])->name('steps.destroy');
});

Auth::routes();