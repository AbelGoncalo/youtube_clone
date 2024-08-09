<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Site\{homeComponent};
use App\Livewire\Auth\{loginComponent,registerComponent};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', homeComponent::class)->name('site.index')->middleware(['auth']);
Route::get('/login', loginComponent::class)->name('site.login');
Route::get('/criar-conta', registerComponent::class)->name('site.register');



