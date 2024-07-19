<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelRoomController;
use App\Http\Controllers\HotelBookingController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;


// Routes accessible to all authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/hotels/{hotel:slug}/{hotel_room}/book', [FrontController::class, 'hotel_room_book'])
        ->name('front.hotel.room.book');

    Route::get('/book/payment/{hotel_booking}/', [FrontController::class, 'hotel_payment'])
        ->name('front.hotel.book.payment');

    Route::put('/book/payment/{hotel_booking}/store', [FrontController::class, 'hotel_payment_store'])
        ->name('front.hotel.book.payment.store');

    Route::get('/book/finish/', [FrontController::class, 'hotel_book_finish'])
        ->name('front.book.finish');

    Route::get('/dashboard/my-bookings', [DashboardController::class, 'my_bookings'])
        ->name('dashboard.my-bookings');

    Route::get('/dashboard/my-bookings/{hotelBooking}', [DashboardController::class, 'booking_details'])
        ->name('dashboard.booking_details');

    Route::get('/hotel/{hotel:slug}/map', [HotelController::class, 'getMapLink'])
        ->name('hotel.map');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('cities', CityController::class)->middleware('can:manage cities');
        Route::resource('countries', CountryController::class)->middleware('can:manage countries');
        Route::resource('hotels', HotelController::class)->middleware('can:manage hotels');

        Route::get('/add/room/{hotel:slug}', [HotelRoomController::class, 'create'])->name('hotel_rooms.create');
        Route::post('/add/room/{hotel:slug}/store', [HotelRoomController::class, 'store'])->name('hotel_rooms.store');
        Route::get('/hotel/{hotel:slug}/room/{hotel_room}', [HotelRoomController::class, 'edit'])->name('hotel_rooms.edit');
        Route::put('/room/{hotel_room}/update', [HotelRoomController::class, 'update'])->name('hotel_rooms.update');
        Route::delete('/hotel/{hotel:slug}/delete/{hotel_room}', [HotelRoomController::class, 'destroy'])->name('hotel_rooms.destroy');

        Route::resource('hotel_bookings', HotelBookingController::class)->middleware('can:manage hotel bookings');
    });
});

// Authentication routes
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/hotels', [FrontController::class, 'hotels'])->name('front.hotels');
Route::post('/hotels/search/', [FrontController::class, 'search_hotels'])->name('front.search.hotels');
Route::get('/hotels/list/{keyword}', [FrontController::class, 'list_hotels'])->name('front.hotels.list');
Route::get('/hotels/details/{hotel:slug}', [FrontController::class, 'hotel_details'])->name('front.hotels.details');
Route::get('/hotels/details/{hotel:slug}/rooms', [FrontController::class, 'hotel_rooms'])->name('front.hotels.rooms');

Route::get('/comingsoon', function () {
    return view('front.comingsoon');
})->name('front.comingsoon');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('front.login');
Route::post('/login', [LoginController::class, 'login'])->name('front.login.post');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Other routes and configurations
require __DIR__.'/auth.php';
