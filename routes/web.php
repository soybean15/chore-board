<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


// Volt::route('/', 'users.index')->name('home')
//     ->middleware('auth');


Route::group(['middleware' => 'guest'], function () {

    Volt::route('/login', 'auth.login')->name('login');
    Volt::route('/register', 'auth.register')->name('register');
    Route::get('/logout',function(){
       Auth::logout();
       return redirect(route('login'));
    })->name('logout')->withoutMiddleware('guest');



});

Route::middleware(['auth'])->group(function(){


    Volt::route('/','pages.home')->name('home');
    Volt::route('/{family}','pages.family')->name('family');
});


