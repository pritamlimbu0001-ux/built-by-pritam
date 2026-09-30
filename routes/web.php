<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ResumeController as AdminResumeController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', HomeController::class)->name('home');


/*
|--------------------------------------------------------------------------
| Public CV Download
|--------------------------------------------------------------------------
|
| Downloads/opens the latest CV stored on Cloudinary.
|
*/

Route::get(
    '/cv',
    [ResumeController::class, 'download']
)->name('cv.download');


/*
|--------------------------------------------------------------------------
| Contact Form Submission
|--------------------------------------------------------------------------
*/

Route::post(
    '/contact',
    [ContactController::class, 'store']
)->name('contact.store');


/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
|
| Login is intentionally not protected by the "guest" middleware.
| AuthController handles already-authenticated admins and login checks.
|
*/

Route::get(
    '/admin/login',
    [AdminAuthController::class, 'showLoginForm']
)->name('admin.login');

Route::post(
    '/admin/login',
    [AdminAuthController::class, 'login']
)->name('admin.login.store');


/*
|--------------------------------------------------------------------------
| Protected Admin Routes
|--------------------------------------------------------------------------
|
| Only authenticated administrators can access these routes.
|
*/

Route::middleware('admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/',
            [DashboardController::class, 'index']
        )->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Logout
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/logout',
            [AdminAuthController::class, 'logout']
        )->name('logout');


        /*
        |--------------------------------------------------------------------------
        | Projects
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'projects',
            ProjectController::class
        )->except(['show']);

        Route::patch(
            'projects/{project}/toggle-published',
            [ProjectController::class, 'togglePublished']
        )->name('projects.toggle-published');

        Route::patch(
            'projects/{project}/toggle-featured',
            [ProjectController::class, 'toggleFeatured']
        )->name('projects.toggle-featured');


        /*
        |--------------------------------------------------------------------------
        | Skills
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'skills',
            SkillController::class
        )->except(['show']);


        /*
        |--------------------------------------------------------------------------
        | Contact Messages
        |--------------------------------------------------------------------------
        */

        Route::get(
            'messages',
            [MessageController::class, 'index']
        )->name('messages.index');

        Route::get(
            'messages/{contactMessage}',
            [MessageController::class, 'show']
        )->name('messages.show');

        Route::patch(
            'messages/{contactMessage}/read',
            [MessageController::class, 'markRead']
        )->name('messages.read');

        Route::patch(
            'messages/{contactMessage}/unread',
            [MessageController::class, 'markUnread']
        )->name('messages.unread');

        Route::delete(
            'messages/{contactMessage}',
            [MessageController::class, 'destroy']
        )->name('messages.destroy');


        /*
        |--------------------------------------------------------------------------
        | Profile
        |--------------------------------------------------------------------------
        |
        | There is only one profile record.
        |
        */

        Route::get(
            'profile',
            [ProfileController::class, 'edit']
        )->name('profile.edit');

        Route::put(
            'profile',
            [ProfileController::class, 'update']
        )->name('profile.update');


        /*
        |--------------------------------------------------------------------------
        | Resume / CV
        |--------------------------------------------------------------------------
        */

        Route::get(
            'resume',
            [AdminResumeController::class, 'index']
        )->name('resume.index');

        Route::post(
            'resume',
            [AdminResumeController::class, 'store']
        )->name('resume.store');

        Route::delete(
            'resume/{resume}',
            [AdminResumeController::class, 'destroy']
        )->name('resume.destroy');

        Route::get(
            'resume/{resume}/download',
            [AdminResumeController::class, 'download']
        )->name('resume.download');


        /*
        |--------------------------------------------------------------------------
        | Social Links
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'social-links',
            SocialLinkController::class
        )
        ->except(['show'])
        ->parameters([
            'social-links' => 'socialLink',
        ]);
    });


/*
|--------------------------------------------------------------------------
| Admin Fallback
|--------------------------------------------------------------------------
|
| Unknown /admin/... URLs go back to the admin dashboard.
|
*/

Route::redirect(
    '/admin/{any}',
    '/admin'
)
->where('any', '.*')
->middleware('admin');