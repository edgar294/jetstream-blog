<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\PostsTable;
use App\Http\Livewire\ImporterComponent;

Route::get('/', PostsTable::class)->name('landing');

Route::middleware(['auth:sanctum', 'verified'])
		->get('/posts', PostsTable::class)
		->name('posts');

Route::middleware(['auth:sanctum', 'verified'])
		->get('/importer', ImporterComponent::class)
		->name('importer');
