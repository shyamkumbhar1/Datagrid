<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyController;


Route::get('family/create', [FamilyController::class, 'create'])->name('family.create');
Route::post('family/store', [FamilyController::class, 'store'])->name('family.store');
Route::get('/', [FamilyController::class, 'list'])->name('family.list');
Route::get('family/show/{id}', [FamilyController::class, 'show'])->name('family.show');
