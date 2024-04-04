<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class);
Route::get('/logout', [\App\Livewire\Home::class, 'logout'])->name('logout');
Route::get('/post/{id}', \App\Livewire\Post::class)->name('details_post');
