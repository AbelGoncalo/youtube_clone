<?php

use App\Http\Controllers\ChannelController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Site\{homeComponent};
use App\Livewire\Channel\{EditchannelComponent};

use App\Livewire\Auth\{loginComponent,registerComponent};

use App\Livewire\Videos\{AllVideo,CreateVideo,EditVideo};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', homeComponent::class)->name('site.index')->middleware(['auth']);
Route::get('/', loginComponent::class)->name('site.login');
Route::get('/criar-conta', registerComponent::class)->name('site.register');

Route::middleware('auth')->group(function(){
    Route::get('/channel/{channel}/edit',EditchannelComponent::class)->name('channel.edit');
});

Route::middleware('auth')->group(function(){
    Route::get('/videos/{channel}/create',CreateVideo::class)->name('video.create');
    Route::get('/videos/{channel}/{video}/edit',EditVideo::class)->name('video.edit');
    Route::get('/videos/{channel}',AllVideo::class)->name('video.all');

});

