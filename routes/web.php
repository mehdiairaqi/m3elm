<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommandeController;


Route::get('/', function () {
    return view('home');  //  buyers will see this after logging in.
})->name('home');
Route::get('/index', function () {
    return view('index');  // Home page view for buyers
})->name('index');

// Dashboard route for experts (restricted to authenticated users)
Route::get('/dashboard', function () {
    return view('dashboard'); // Dashboard for experts
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth routes (login, logout)
Route::middleware('guest')->group(function () {
    // Route for login form
    Route::get('login', function () {
        return view('auth.login');  // Login form
    })->name('login');

    // Route for login submission (POST)
    Route::post('login', [AuthenticatedSessionController::class, 'store']);  // Login action

    // Route for logout (POST)
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Profile routes (edit, update, and destroy)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Role switching route: Make a user an expert (switch from buyer to expert)
Route::middleware('auth')->group(function () {
    Route::post('/switch-to-expert', [UserController::class, 'switchToExpert'])->name('user.switchToExpert');
});

require __DIR__.'/auth.php';  // This includes all the default routes related to authentication

Route::middleware('guest')->group(function () {
    Route::get('login', function () {
        return view('auth.login');  // Login form
    })->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);  // Login action

});
Route::middleware('auth')->group(function () {
    // Logout route (POST request)
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Role switching routes
Route::middleware('auth')->group(function () {
    // Route to switch to expert
    Route::post('/switch-to-expert', [UserController::class, 'switchToExpert'])->name('user.switchToExpert');

    // Route to switch to buyer
    Route::post('/switch-to-buyer', [UserController::class, 'switchToBuyer'])->name('user.switchToBuyer');
});
Route::get('/messages/{userId}', [MessageController::class, 'index'])->name('messages.index');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');


Route::get('/experts', [ExpertController::class, 'index'])->name('experts.index');
Route::get('/experts/create', [ExpertController::class, 'create'])->name('experts.create');
Route::post('/experts', [ExpertController::class, 'store'])->name('experts.store');
Route::post('/experts/{id}/review', [ExpertController::class, 'review'])->name('experts.review');

Route::middleware(['auth', 'check.admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});


Route::get('/plombier', function () {
    return view('plombier');
});



Route::get('/chaufagisste', function () {
    return view('chaufagisste');
});



Route::get('/inspecter', function () {
    return view('inspecter');
});
Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes.create');

Route::get('/service', function () {
    return view('service1');
});
Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');

Route::middleware('auth')->resource('commandes', CommandeController::class);



