<?php

use Controller\DisciplineController;
use Controller\GroupController;
use Controller\StudentController;
use Controller\StudyPlanController;
use Controller\UserController;
use Controller\GradeController;
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
Route::add('GET', '/employees', [UserController::class, 'index']);
Route::add('GET', '/employees/create', [UserController::class, 'create']);
Route::add('POST', '/employees/store', [UserController::class, 'store']);
Route::add('GET', '/groups', [GroupController::class, 'index']);
Route::add('GET', '/groups/create', [GroupController::class, 'create']);
Route::add('POST', '/groups/store', [GroupController::class, 'store']);
Route::add('GET', '/disciplines', [DisciplineController::class, 'index']);
Route::add('GET', '/disciplines/create', [DisciplineController::class, 'create']);
Route::add('POST', '/disciplines/store', [DisciplineController::class, 'store']);
Route::add('POST', '/employees/change_role', [UserController::class, 'change_role']);
Route::add('GET', '/studyplan', [StudyPlanController::class, 'index']);
Route::add('GET', '/studyplan/create', [StudyPlanController::class, 'create']);
Route::add('POST', '/studyplan/store', [StudyPlanController::class, 'store']);
Route::add('GET', '/studyplan/group/{id}', [StudyPlanController::class, 'getByGroup']);
Route::add('GET', '/grades', [GradeController::class, 'index']);
Route::add('GET', '/grades/create', [GradeController::class, 'create']);
Route::add('POST', '/grades/store', [GradeController::class, 'store']);
Route::add('GET', '/grades/student/{id}', [GradeController::class, 'getByStudent']);
Route::add('GET', '/grades/group/{groupId}/discipline/{disciplineId}', [GradeController::class, 'getByGroupAndDiscipline']);