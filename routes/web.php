<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
Route::get('/lista', [dashboardController::class, 'lista'])->name('lista');
Route::post('/pagamento', [dashboardController::class, 'pagamento'])->name('pagamento');
Route::get('/consulta/{id}', [dashboardController::class, 'consulta'])->name('consulta');