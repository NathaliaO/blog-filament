<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class);
Route::get('/post/{id}', \App\Livewire\Post::class)->name('details_post');
