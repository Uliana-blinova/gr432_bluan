<?php

use Controller\StudentController;
use Controller\UserController;
use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/students', [StudentController::class, 'index']);
Route::add('GET', '/students/search', [StudentController::class, 'search']);
Route::add('GET', '/students/create', [StudentController::class, 'create']);
Route::add('POST', '/students/store', [StudentController::class, 'store']);
Route::add('GET', '/students/{id}', [StudentController::class, 'show']);
Route::add('GET', '/employees', [UserController::class, 'index']);
