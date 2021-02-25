<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoriaController;
use App\Http\Controllers\api\ProductoController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\DatoMaestroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/






//  DATA MASTER ROUTES
Route::get('/datalogin', [DatoMaestroController::class, 'datalogin']);
Route::middleware('auth:sanctum')->post('/store/token', [DatoMaestroController::class, 'storetoken']);
Route::post('/register/bitacora', [DatoMaestroController::class, 'registrarbitacora']);

//CATEGORIAS
Route::middleware('auth:sanctum')->get('/categorias', [CategoriaController::class, 'getcategorias']);
Route::middleware('auth:sanctum')->post('/guardarcategorias', [CategoriaController::class, 'guardarPreferencias']);
Route::post('/obtenerporcategoria', [CategoriaController::class, 'obtenerPorCategoria']);
Route::middleware('auth:sanctum')->post('/obtenerproductos', [CategoriaController::class, 'obtenerProductos']);
Route::middleware('auth:sanctum')->post('/obtenermasvendido', [CategoriaController::class, 'masVendido']);
Route::middleware('auth:sanctum')->post('/categoriasconproductos', [CategoriaController::class, 'categoriasConProductos']);
Route::middleware('auth:sanctum')->post('/categoriasconproducto', [CategoriaController::class, 'categoriasConProducto']);
Route::middleware('auth:sanctum')->post('/obtenersimilares',[CategoriaController::class,'obtenerSimilaes']);

Route::middleware('auth:sanctum')->post('/categoriasdeusuario',[CategoriaController::class,'categoriasDeUsuario']);
Route::middleware('auth:sanctum')->post('/guardarcategoriasdeusuario',[CategoriaController::class,'guardarCategoriasDeUsuario']);

Route::middleware('auth:sanctum')->post('/datosextradeproducto',[ProductoController::class,'datosExtraDeProducto']);
Route::middleware('auth:sanctum')->post('/productoalcarrito',[ProductoController::class,'productoAlCarrito']);
Route::middleware('auth:sanctum')->post('/productosdecarrito',[ProductoController::class,'productosDeCarrito']);
Route::middleware('auth:sanctum')->post('/eliminarproducto',[ProductoController::class,'eliminarProducto']);
Route::middleware('auth:sanctum')->post('/actualizarcompraproducto',[ProductoController::class,'actualizarCompraProducto']);
Route::middleware('auth:sanctum')->post('/buscarproductos',[ProductoController::class,'buscarProductos']);
Route::middleware('auth:sanctum')->post('/buscarproductosfiltrados',[ProductoController::class,'buscarProductosFiltrados']);

Route::middleware('auth:sanctum')->post('/compra',[\App\Http\Controllers\api\CompraController::class,'compra']);

//PRODUCTOS
//Route::get('/productos',[])









































//LOGIN ROUTES
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware('guest')->post('/forgot-password', [AuthController::class, 'forgotPassword']);





//VERIFICATION ROUTES
Route::post('send-mail', [AuthController::class, 'sendEmail'] )->name('email');
