<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Trainingcontroller;


Route::get('/',[Trainingcontroller::class, 'index']);
Route::get('/trainings/create',[Trainingcontroller::class, 'create'])->middleware('auth');
Route::get('/trainings/{id}',[Trainingcontroller::class, 'show']);
Route::post('/trainings', [Trainingcontroller::class, 'store']);
Route::delete('/trainings/{id}', [Trainingcontroller::class, 'destroy'])->middleware('auth');
Route::get('/trainings/edit/{id}', [Trainingcontroller::class, 'edit'])->middleware('auth');
Route::put('/trainings/update/{id}', [Trainingcontroller::class, 'update'])->middleware('auth');


Route::get('/dashboard', [Trainingcontroller::class, 'dashboard'])->middleware('auth');
Route::post('trainings/join/{id}', [Trainingcontroller::class, 'joinTraining'])->middleware('auth');

Route::delete('trainings/leave/{id}', [Trainingcontroller::class, 'leaveTraining'])->middleware('auth');




