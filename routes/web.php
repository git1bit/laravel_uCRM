<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Controllers\InertiaTestController;
use App\Http\Controllers\CustomerController;

// Route::get('download', 'CsvController@download')->name('download.index');
Route::get('/download-csv', [\App\Http\Controllers\Controller::class, 'downloadCsv'])->name('download-csv');

Route::resource('customers', CustomerController::class)
->middleware(['auth', 'verified']);


Route::get('/inertia-test', function () {
    return Inertia::render('InertiaTest');
}
);

Route::get('/component-test', function () {
    return Inertia::render('ComponentTest');
}
);

Route::get('/inertia/index' , [InertiaTestController::class, 'index'])->name('inertia.index');
Route::get('/inertia/create' , [InertiaTestController::class, 'create'])->name('inertia.create');
Route::post('/inertia' , [InertiaTestController::class, 'store'])->name('inertia.store');
Route::get('/inertia/show/{id}' , [InertiaTestController::class, 'show'])->name('inertia.show');
Route::delete('/inertia/{id}' , [InertiaTestController::class, 'delete'])->name('inertia.delete');

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
