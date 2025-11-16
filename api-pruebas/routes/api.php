<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// --- 2 Endpoints Públicos (Registro y Login) ---
// Pruebas Funcionales:
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// --- 6+ Endpoints Protegidos (CRUD y Búsqueda de Productos) ---
// Requieren autenticación vía Sanctum (Bearer Token)
Route::middleware('auth:sanctum')->group(function () {
    
    // Endpoint de Logout
    Route::post('/logout', [AuthController::class, 'logout']); // Funcional

    // Endpoint de Búsqueda (Ideal para Pruebas de Rendimiento)
    Route::get('/products/search', [ProductController::class, 'search']);
    
    // Endpoints del CRUD de Productos (Ideales para Pruebas Funcionales)
    Route::get('/products', [ProductController::class, 'index']);      // 1. Listar (Rendimiento)
    Route::post('/products', [ProductController::class, 'store']);     // 2. Crear (Funcional)
    Route::get('/products/{product}', [ProductController::class, 'show']);   // 3. Ver (Funcional)
    Route::put('/products/{product}', [ProductController::class, 'update']); // 4. Actualizar (Funcional)
    // NOTA: Route::patch también es válido para 'update' si se usa 'sometimes'
    Route::delete('/products/{product}', [ProductController::class, 'destroy']); // 5. Borrar (Funcional)

    // Endpoint de usuario autenticado (extra)
    Route::get('/user', function (Request $request) { // Funcional
        return $request->user();
    });
});