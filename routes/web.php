<?php

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


Route::get('/', 'FrontController@index')->name('home');
Route::get('/accessories', 'FrontController@shirts')->name('shirts');
Route::get('/carwash', 'FrontController@carwash')->name('carwash');
Route::get('/detailing', 'FrontController@detailing')->name('detailing');
Route::get('/contact', 'FrontController@contact')->name('contact');
Route::get('/product/{id}', 'FrontController@shirt')->name('shirt');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/order/{id}', 'CheckoutController@order')->name('order');
Route::get('/orders', 'OrderController@index')->name('orders');
Route::get('/cancelOrder/{id}', 'OrderController@cancelOrder')->name('cancel');
Route::get('/book', 'ReceiptController@book');
Route::get('/home', 'HomeController@index');
Route::resource('/cart', 'CartController');
Route::resource('/reservations', 'ReservationController');
Route::resource('/receipts', 'ReceiptController');
Route::get('/cart/add-item/{id}', 'CartController@addItem')->name('cart.addItem');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')->name('toggle.deliver');

    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::post('product/image-upload/{productId}','ProductsController@uploadImages');
    Route::resource('product','ProductsController');
    Route::resource('category','CategoriesController');

    Route::get('orders/{type?}', 'OrderController@Orders');
    Route::get('bookings/{type?}', 'BookingController@index');
    Route::get('done-bookings/{id}', 'BookingController@markAsDone')->name('marked');

});
Route::resource('address','AddressController');

//Route::get('checkout','CheckoutController@step1');
Route::group(['middleware' => 'auth'], function () {
    Route::get('shipping-info','CheckoutController@shipping')->name('checkout.shipping');
});


Route::get('payment/{id}','CheckoutController@payment')->name('checkout.payment');
Route::post('store-payment','CheckoutController@storePayment')->name('payment.store');


Route::get('test',function(){
   $orders=App\Order::find(2);
   $items=$orders->orderItems;
dd($items);
});