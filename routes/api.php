<?php

use App\Http\Controllers\TipoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tarefas', [TarefaController::class, 'index']);
Route::get('/tarefas/{id}', [TarefaController::class, 'show']);
Route::post('/tarefas', [TarefaController::class, 'store']);
Route::put('/tarefas/{id}', [TarefaController::class, 'update']);
Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy']);

Route::get('/tipos', [TipoController::class, 'index']);
Route::get('/tipos/{id}', [TipoController::class, 'show']);
Route::post('/tipos', [TipoController::class, 'store']);
Route::put('/tipos/{id}', [TipoController::class, 'update']);
Route::delete('/tipos/{id}', [TipoController::class, 'destroy']);