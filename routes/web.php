<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-rabbitmq', function () {
    \App\Jobs\TestRabbitMQJob::dispatch()->onQueue('rabbit');
    return 'Job dispatched!';
});

Route::get('/search', [ExampleController::class, 'index']);
Route::post('/store', [ExampleController::class, 'store']);