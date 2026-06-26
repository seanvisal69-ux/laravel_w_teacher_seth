<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SensorsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    return view('welcome');
});

// view: get the file php in resources/views
Route::get('/about', function () {
    return view('about');
});

//@@@ It's require a parameter
Route::get('/user/{id}', function ($id) {
    return "User ID is $id";
});
//@@@ it's an optional parameter {slug?} and add the default $slug = 'default-post'
Route::get('/post/{slug?}', function ($slug = 'default-post') {
    return "Post slug: $slug";
});
//@@@ Name function: to name a function so we can generate in controller
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/test', function () {
    $route = route('dashboard');
    return 'The url for this dashboard is:' . $route;
});

//@@@ prefix a group of Route
Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return 'Admin Users';
    });

    Route::get('/posts', function () {
        return 'Admin Posts';
    });
});



//@@@ Middleware to cut in the middle of a process
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return 'User Profile';
    });
});
//need to define login (name a function for login to login)
Route::get('/login', function () {
    return 'login page';
})->name('login');

//@@@ to get into dashboard you need to get authenticate. it's an ok from middleware
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

//@@@Call controller
Route::get('/user/{id}', [UserController::class, 'show']);

//@@@ fallback when error
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});



use App\Http\Controllers\CategoryController;

Route::get('/category', [CategoryController::class, 'index'])->name("category.list");

Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");

Route::post('/category', [CategoryController::class, 'store'])->name("category.store");

Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');

Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');

Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');

Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");

//Route::resource('/product',ProductController::class);

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');

Route::resource('sensor', SensorsController::class);

Route::get('/', [FrontendController::class, 'index']);
Route::get('/list',[FrontendController::class,'list']);
Route::get('/show/{id}',[FrontendController::class,'show']);