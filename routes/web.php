<?php

use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\AdminPostsController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectPhotoController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', HomeController::class);
Route::resource('/blog', BlogController::class)->except(['store', 'update', 'edit'])->parameters(['post' => 'slug']);
Route::get('/blog/category/{category}', CategoriesController::class)->name('blog.category');
Route::get('/blog/search', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/tag/{tag}', TagsController::class)->name('blog.tag');
Route::prefix('/view-projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('project.index');

    Route::get('/{id}', [ProjectController::class, 'show'])->name('project.show');
});

Route::post('/newsletter', NewsletterController::class);
Route::post('/clients', ClientController::class)->name('guest.clients');

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
    Route::prefix('admin')->group(function () {
        Route::resource('announcements', AnnouncementController::class);
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
            Route::resource('/categories', AdminCategoriesController::class);


        });
        Route::resource('/clients', AdminClientController::class)->names([
            'index' => 'admin.clients.index',
            'create' => 'admin.clients.create',
            'store' => 'admin.clients.store',
            'show' => 'admin.clients.show',
            'edit' => 'admin.clients.edit',
            'destroy' => 'admin.clients.destroy',
        ]);
        Route::post("/company-info", AdminCompanyController::class)->name('admin.company-info');
        Route::prefix("project-photos")->group(function () {
            Route::post('/', [ProjectPhotoController::class, 'store'])->name('project_photos.store');
            Route::put('/{id}', [ProjectPhotoController::class, 'update'])->name('project_photos.update');
        });
        Route::resource('/services', ServiceController::class)->names([
            'index' => 'admin.services.index',
            'create' => 'admin.services.create',
            'store' => 'admin.services.store',
            'show' => 'admin.services.show',
            'edit' => 'admin.services.edit',
            'destroy' => 'admin.services.destroy',
        ]);
        Route::resource('/testimonials', AdminTestimonialController::class)->names([
            'index' => 'admin.testimonials.index',
            'create' => 'admin.testimonials.create',
            'store' => 'admin.testimonials.store',
            'show' => 'admin.testimonials.show',
            'edit' => 'admin.testimonials.edit',
            'destroy' => 'admin.testimonials.destroy',
        ]);
        Route::resource('/projects', AdminProjectController::class)->names([
            'index' => 'admin.projects.index',
            'create' => 'admin.projects.create',
            'store' => 'admin.projects.store',
            'show' => 'admin.projects.show',
            'edit' => 'admin.projects.edit',
            'destroy' => 'admin.projects.destroy',
        ]);
        Route::get("/settings", SettingsController::class)->name('admin.settings');

    });
});

require __DIR__ . '/auth.php';
