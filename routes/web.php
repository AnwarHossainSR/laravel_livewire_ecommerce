<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\User\UserDashboardComponent;

Route::get('/',HomeComponent::class);
Route::get('/shop',ShopComponent::class)->name('product.shop');
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class);
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');
Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('product.search');

//User or customer
Route::middleware(['auth:sanctum', 'verified'])->group( function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

//Admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group( function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});
