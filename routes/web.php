<?php

use App\Models\ToDoList;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoListController;

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
    $lists = ToDoList::where('status', 'A')->get();
    return view('index', ['lists' => $lists]);
});

Route::post('/create-list', [ToDoListController::class, 'create']);
Route::put('/edit-list/{list}', [ToDoListController::class, 'edit']);
Route::delete('/delete-list/{list}', [ToDoListController::class, 'delete']);