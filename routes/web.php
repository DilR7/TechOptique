<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function(){
//     return view('welcome');
// });

Route::controller(HomeController::class)->group(function (){
    Route::get('/', 'index')->name('Home');
});

Route::controller(ClientController::class)->group(function (){
    Route::get('/category/{id}/{slug}', 'categoryPage')->name('categorypage');
    Route::get('/product-details/{id}/{slug}', 'singleProduct')->name('singleproduct');
    Route::get('/add-to-cart', 'addToCart')->name('addtocart');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/user-profile', 'userProfile')->name('userprofile');
    Route::get('/new-release', 'newRelease')->name('newrelease');
    Route::get('/todays-deal', 'todaysDeal')->name('todaysdeal');
    Route::get('/customer-service', 'customerService')->name('customerservice');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/admin/dashboard', 'index')->name('admindashboard');
    });

    Route::controller(CategoryController::class)->group(function(){
        Route::get('/admin/all-category', 'index')->name('allcategory');
        Route::get('/admin/add-category', 'addCategory')->name('addcategory');
        Route::post('/admin/store-category', 'storeCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'editCategory')->name('editcategory');
        Route::post('/admin/update-category', 'updateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'deleteCategory')->name('deletecategory');
    });

    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/admin/all-subcategory', 'index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'addSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'storeSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'editSubCategory')->name('editsubcategory');
        Route::get('/admin/delete-subcategory/{id}', 'deleteSubCategory')->name('deletesubcategory');
        Route::post('/admin/update-subcategory', 'updateSubCategory')->name('updatesubcategory');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('/admin/all-product', 'index')->name('allproducts');
        Route::get('/admin/add-product', 'addProduct')->name('addproduct');
        Route::post('/admin/store-product', 'storeProduct')->name('storeproduct');
        Route::get('/admin/edit-product-img/{id}', 'editProductImg')->name('editproductimg');
        Route::post('/admin/update-product-img', 'updateProductImg')->name('updateproductimg');
        Route::get('/admin/edit-product/{id}', 'editProduct')->name('editproduct');
        Route::post('/admin/update-product', 'updateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}', 'deleteProduct')->name('deleteproduct');
    });

    Route::controller(OrderController::class)->group(function(){
        Route::get('/admin/pending-order', 'index')->name('pendingorder');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
