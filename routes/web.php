<?php

declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Context;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use MakwoodStudio\Project\Jobs\NewProject;
use MakwoodStudio\Project\Models\Project;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/queue', function () {

    $project = Project::create();
    Context::add('Project', $project);
    Log::debug('Test Queue: Start');
    NewProject::dispatch($project);
    Log::debug('Test Queue: End');

    return 'Done!';
});
