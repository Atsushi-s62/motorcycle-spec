<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     // return view('welcome');
// });

Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
Route::get('/posts/commentId/{post}',[PostController::class, 'commentId'])->name('posts.commentId');
Route::post('/posts/commentId/{post}',[CommentController::class, 'store'])->name('comments.store');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
    Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit',[PostController::class, 'edit'])->name('posts.edit');
    Route::get('/posts/csvImportForm',[PostController::class, 'csvImportForm'])->name('posts.csvImportForm');
    Route::post('/posts/csvImport',[PostController::class, 'csvImport'])->name('posts.csvImport');
    Route::get('/posts/{post}',[PostController::class, 'editId'])->name('posts.edit.id');
    Route::patch('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/edit/{post}',[PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/editComment/{post}',[PostController::class, 'editComment'])->name('posts.edit.comment');

    
    Route::delete('/posts/{post}/comments/{comment}',[CommentController::class, 'destroy'])->name('comments.destroy');
});

require __DIR__.'/auth.php';



// 公開
// Route::get('/posts',[PostController::class, 'index'])->name('posts.index');

// 管理者のみ
// Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
// Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/edit',[PostController::class, 'edit'])->name('posts.edit');
// Route::get('/posts/csvImportForm',[PostController::class, 'csvImportForm'])->name('posts.csvImportForm');
// Route::post('/posts/csvImport',[PostController::class, 'csvImport'])->name('posts.csvImport');


// 公開
// Route::get('/posts/commentId/{post}',[PostController::class, 'commentId'])->name('posts.commentId');

// // 管理者のみ
// Route::get('/posts/{post}',[PostController::class, 'editId'])->name('posts.edit.id');
// Route::patch('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/edit/{post}',[PostController::class, 'destroy'])->name('posts.destroy');
// Route::get('/posts/editComment/{post}',[PostController::class, 'editComment'])->name('posts.edit.comment');

// Route::post('/posts/commentId/{post}',[CommentController::class, 'store'])->name('comments.store');
// Route::delete('/posts/{post}/comments/{comment}',[CommentController::class, 'destroy'])->name('comments.destroy');
