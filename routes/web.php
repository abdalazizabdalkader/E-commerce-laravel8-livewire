<?php

use App\Http\Livewire\Admin\AddCategoryAdminComponent;
use App\Http\Livewire\Admin\AddProductComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\CategoryAdminComponent;
use App\Http\Livewire\Admin\EditCategoryAdminComponent;
use App\Http\Livewire\Admin\EditProductComponent;
use App\Http\Livewire\Admin\ProductAdminComponent as AdminProductAdminComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ProductAdminComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

    Route::get('/',HomeComponent::class);
    Route::get('/shop',ShopComponent::class);
    Route::get('/cart',CartComponent::class)->name('product.cart');
    Route::get('/checkout',CheckoutComponent::class);
    Route::get('/product/details/{slug}',DetailsComponent::class)->name('product.details');
    Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');
    Route::get('/search', SearchComponent::class)->name('product.search');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
//for users or customers
Route::middleware(['auth:sanctum', 'verified',])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});
//for admins
Route::middleware(['auth:sanctum', 'verified','AuthAdmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories', CategoryAdminComponent::class)->name('admin.categories');
    Route::get('/admin/categories/add', AddCategoryAdminComponent::class)->name('admin.addcategories');
    Route::get('/admin/categories/edit/{category_slug}',EditCategoryAdminComponent::class)->name('admin.editcategory');
    Route::get('/admin/products',AdminProductAdminComponent::class)->name('admin.product');
    Route::get('/admin/product/add',AddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',EditProductComponent::class)->name('admin.editproduct');

});
