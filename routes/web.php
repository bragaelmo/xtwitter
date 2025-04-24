<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('welcome');
});

/*Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');
*/
Route::get('/home', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/live', function () {
        $posts = \App\Models\Post::with('user')->latest()->get();
        return view('partials.tettes', compact('posts'));
    })->name('posts.live')->middleware('auth');
});

require __DIR__.'/auth.php';
