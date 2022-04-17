<?php

use App\Http\Livewire\Admin\AddCategoryAdminComponent;
use App\Http\Livewire\Admin\AddCouponAdminComponent;
use App\Http\Livewire\Admin\AddHomeSliderAdminComponent;
use App\Http\Livewire\Admin\AddProductComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\CategoryAdminComponent;
use App\Http\Livewire\Admin\ContactusAdminComponent;
use App\Http\Livewire\Admin\CouponAdminComponent;
use App\Http\Livewire\Admin\EditCategoryAdminComponent;
use App\Http\Livewire\Admin\EditCouponAdminComponent;
use App\Http\Livewire\Admin\EditHomeSliderAdminComponent;
use App\Http\Livewire\Admin\EditProductComponent;
use App\Http\Livewire\Admin\HomeCategoryAdminComponent;
use App\Http\Livewire\Admin\HomeSliderAdminComponent;
use App\Http\Livewire\Admin\OrderDetailsAdminComponent;
use App\Http\Livewire\Admin\OrdersAdminComponent;
use App\Http\Livewire\Admin\ProductAdminComponent as AdminProductAdminComponent;
use App\Http\Livewire\Admin\SaleAdminComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ChangePasswordUserComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactusComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ProductAdminComponent;
// use App\Http\Livewire\SaleAdminComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\OrderDetailsUserComponent;
use App\Http\Livewire\User\OrdersUserComponent;
use App\Http\Livewire\User\ReviewUserComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\WishListComponent;
use App\Models\Sale;
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

    Route::get('/',HomeComponent::class)->name('home');
    Route::get('/shop',ShopComponent::class);
    Route::get('/cart',CartComponent::class)->name('product.cart');
    Route::get('/checkout',CheckoutComponent::class);
    Route::get('/product/details/{slug}',DetailsComponent::class)->name('product.details');
    Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');
    Route::get('/search', SearchComponent::class)->name('product.search');
    Route::get('/wishlist',WishListComponent::class)->name('product.wishlist');
    Route::get('/checkout',CheckoutComponent::class)->name('checkout');
    Route::get('/thankyou',ThankyouComponent::class)->name('thankyou');
    Route::get('/contactus',ContactusComponent::class)->name('contactus');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
//for users or customers
Route::middleware(['auth:sanctum', 'verified',])->group(function(){

    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/admin/categories', CategoryAdminComponent::class)->name('admin.categories');
    Route::get('/user/myOrders',OrdersUserComponent::class)->name('user.orders');
    Route::get('/user/myOrder/details/{order_id}',OrderDetailsUserComponent::class)->name('user.orderdetails');
    Route::get('/user/review/{order_item_id}', ReviewUserComponent::class)->name('user.review');
    Route::get('/user/changepassword', ChangePasswordUserComponent::class)->name('user.changepassword');
});

//for admins
Route::middleware(['auth:sanctum', 'verified','AuthAdmin'])->group(function(){

    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories/add', AddCategoryAdminComponent::class)->name('admin.addcategories');
    Route::get('/admin/categories/edit/{category_slug}',EditCategoryAdminComponent::class)->name('admin.editcategory');
    Route::get('/admin/products',AdminProductAdminComponent::class)->name('admin.product');
    Route::get('/admin/product/add',AddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',EditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/homeslider',HomeSliderAdminComponent::class)->name('admin.homeslider');
    Route::get('/admin/homeslider/add',AddHomeSliderAdminComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/homeslider/edit/{slide_id}',EditHomeSliderAdminComponent::class)->name('admin.edithomeslider');

    Route::get('/admin/home-categories',HomeCategoryAdminComponent::class)->name('admin.homecategory');
    Route::get('/admin/sale',SaleAdminComponent::class)->name('admin.sale');

    Route::get('/admin/coupon',CouponAdminComponent::class)->name('admin.coupon');
    Route::get('/admin/coupon/add',AddCouponAdminComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}', EditCouponAdminComponent::class)->name('admin.editcoupon');

    Route::get('/admin/orders',OrdersAdminComponent::class)->name('admin.orders');
    Route::get('/admin/order/details/{order_id}', OrderDetailsAdminComponent::class)->name('admin.orderdetails');

    Route::get('/admin/contacts', ContactusAdminComponent::class)->name('admin.contacts');
});
