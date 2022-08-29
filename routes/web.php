<?php

use App\Http\Controllers\Controller;
use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\AddCategoryComponent;
use App\Http\Livewire\Admin\AddProductComponent;
use App\Http\Livewire\Admin\AdminAddCouponsComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminEditCouponsComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\CategoryListComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\Admin\EditProductComponent;
use App\Http\Livewire\Admin\ProductListComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\OrderDetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\TestDb;
use App\Http\Livewire\ThankYouComponent;
use App\Http\Livewire\WishListComponent;
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
// route menu 
Route::get('/', HomeComponent::class); 
Route::get('/shop', ShopComponent::class);
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/thankyou', ThankYouComponent::class)->name('thank');
Route::get('order-details', OrderDetailsComponent::class)->name('orderdetails');
Route::get('/contact', ContactComponent::class);
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/category/{slug}', CategoryComponent::class)->name('product.category');
Route::get('/test-db', TestDb::class);
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/about-us', AboutUsComponent::class)->name('about');
Route::get('/search' ,SearchComponent::class)->name('search');  

Route::get('/category-list', CategoryListComponent::class)->name('category.list');
Route::get('/category-add', AddCategoryComponent::class)->name('category.add');
Route::get('/category-edit/{slug}', EditCategoryComponent::class)->name('category.edit');

Route::get('/product-list', ProductListComponent::class)->name('product.list');
Route::get('/product-add', AddProductComponent::class)->name('product.add');
Route::get('/product-edit/{slug}', EditProductComponent::class)->name('product.edit');
Route::get('wish-list', WishListComponent::class)->name('wish');

//route admin
Route::get('/admin',AdminComponent::class)->name('admin');
Route::get('/slider', AdminHomeSliderComponent::class)->name('admin.homeslider');
Route::get('/slider-add', AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
Route::get('/slider-edit/{slug}', AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
Route::get('/home-categories', AdminHomeCategoryComponent::class)->name('admin.homecategories');
Route::get('/admin-sale', AdminSaleComponent::class)->name('admin.sale');
Route::get('/admin-coupons', AdminCouponsComponent::class)->name('admin.coupons');
Route::get('/admin-coupons-add', AdminAddCouponsComponent::class)->name('admin.addcoupons');
Route::get('/admin-coupons-edit/{slug}', AdminEditCouponsComponent::class)->name('admin.editcoupons');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboar d');
})->name('dashboard');               
 
