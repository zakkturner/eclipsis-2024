<?php

use App\Http\Controllers\Admin\AdminPostsController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', HomeController::class);
Route::resource('/blog', BlogController::class)->except(['store', 'update', 'edit'])->parameters(['post' => 'slug']);
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('admin', function () {
    return redirect()->route('dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('announcements', AnnouncementController::class);
    Route::prefix('admin')->group(function () {
        Route::resource('/services', ServiceController::class)->names([
            'index' => 'admin.services.index',
            'create' => 'admin.services.create',
            'store' => 'admin.services.store',
            'show' => 'admin.services.show',
            'edit' => 'admin.services.edit',
            'destroy' => 'admin.services.destroy',
        ]);
        Route::prefix("blog")->group(function () {
//            Route::get('/', [BlogController::class, 'index'])->name('admin.blog.index');
            Route::resource('/post', AdminPostsController::class)->parameters(['post' => 'slug'])->names([
                'index' => 'admin.blog.index',
                'show' => 'admin.blog.show',
                'create' => 'admin.blog.create',
                'store' => 'admin.blog.store',
                'edit' => 'admin.blog.edit',
                'destroy' => 'admin.blog.destroy',
            ]);
            Route::resource('/categories', CategoriesController::class);
        });
    });
});

require __DIR__ . '/auth.php';
