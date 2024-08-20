<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/', [AdminController::class, 'home'])->name('home2');

Route::get('/home',[AdminController::class, 'index'])->name('home');


Route::middleware(['auth', 'admin'])->group(function() {

    Route::get('/create_room',[AdminController::class, 'create_room'])->name('create_room');

    Route::post('/add_room',[AdminController::class, 'add_room'])->name('add_room');

    Route::get('/view', [AdminController::class, 'view_room'])->name('view_room');

    Route::get('/room_delete/{id}', [AdminController::class, 'room_delete'])->name('room_delete');

    Route::get('/update_room/{id}',[AdminController::class, 'update_room'])->name('update_room');

    Route::post('/edit_room/{id}', [AdminController::class, 'edit_room'])->name('edit_room');

    Route::get('/bookings', [AdminController::class, 'bookings'])->middleware('admin')->name('bookings');

    Route::get('/delete_booking/{id}', [AdminController::class, 'delete_booking'])->name('delete_booking');

    Route::get('/approve_book/{id}', [AdminController::class, 'approve_book'])->name('approve_book');

    Route::get('/reject_book/{id}', [AdminController::class, 'reject_book'])->name('reject_book');

    Route::get('/view_gallery', [AdminController::class, 'view_gallery'])->name('view_gallery');

    Route::post('/upload_gallary',[AdminController::class, 'upload_gallary'])->name('upload_gallary');

    Route::get('/delete_gallary/{id}', [AdminController::class, 'delete_gallary'])->name('delete_gallary');

    Route::get('/all_messages', [AdminController::class, 'all_messages'])->name('all_messages');

    Route::get('/send_mail/{id}', [AdminController::class, 'send_mail'])->name('send_mail');

    Route::post('mail/{id}', [AdminController::class, 'mail'])->name('mail');

});

Route::get('/room_details/{id}',[HomeController::class, 'room_details'])->name('room_details');

Route::get('/our_rooms', [HomeController::class, 'our_rooms'])->name('our_rooms');

Route::get('/hotel_gallary', [HomeController::class, 'hotel_gallary'])->name('hotel_gallary');

Route::get('/contact_us', [HomeController::class, 'contact_us'])->name('contact_us');

Route::get('/hotel_about', [HomeController::class, 'hotel_about'])->name('hotel_about');

Route::post('/add_booking/{id}',[HomeController::class, 'add_booking'])->name('add_booking');

Route::post('/contact', [HomeController::class, 'contactUs'])->name('contact');



