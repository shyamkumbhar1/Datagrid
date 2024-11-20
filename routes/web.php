<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyController;

Route::get('family/create', [FamilyController::class, 'create'])->name('family.create');
Route::post('family/store', [FamilyController::class, 'store'])->name('family.store');
Route::get('family/add-members/{familyHeadId}', [FamilyController::class, 'addMembers'])->name('family.addMembers');
Route::post('family/store-members', [FamilyController::class, 'storeMembers'])->name('family.storeMembers');
Route::get('/', [FamilyController::class, 'index'])->name('family.list');
Route::get('family/{id}', [FamilyController::class, 'show'])->name('family.show');

// Route::get('family/add-members/{familyHeadId}', [FamilyController::class, 'addMembers'])->name('family.addMembers');

