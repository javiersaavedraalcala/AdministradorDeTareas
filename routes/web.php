<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserTasksController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/create-user', function () {
    return view('createUser');
})->middleware(['auth','isAdmin'])->name('createUser');

Route::get('/create-task', function () {
    return view('createTask');
})->middleware(['auth','isAdmin'])->name('createTask');

Route::get('/create-task', [TaskController::class, 'getUsers'])
->middleware(['auth','isAdmin'])->name('createTask');

Route::Get('/new-task', function () {
    return view('newTask');
})->middleware(['auth'])->name('newTask');




Route::resource('user', UserController::class)
->middleware(['auth','isAdmin']);

Route::resource('task', TaskController::class)
->middleware(['auth','isAdmin']);

Route::resource('usertask', UserTasksController::class)
->middleware(['auth']);

use App\Models\Task;
Route::get('test', function() {
    $tasks = Task::get();

    foreach($tasks as $task) {
        echo "$task->id $task->name {$task->user->name} <br>";
    }
});




require __DIR__.'/auth.php';
