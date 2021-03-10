<?php

use App\Http\Livewire\Empresa\Miembro\MiembrosTable;
use App\Http\Livewire\Empresa\Productos\EnviosPendientesTable;
use App\Http\Livewire\Empresa\Productos\EnviosRealizadosTable;
use App\Http\Livewire\Empresa\Productos\ProductosTable;
use App\Http\Livewire\ShowReportes;
use Carbon\Carbon;
use App\Http\Livewire\CategoriasTable;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//START ROUTE
Route::middleware(['auth:sanctum', 'verified'])->get('/start',\App\Http\Livewire\Start::class)->name('start');


//ADMINISTRATION ROUTES
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/adm/dashboard',\App\Http\Livewire\Adm\Dashboard::class)->name('adm.dashboard');
    Route::get('/adm/bitacora', \App\Http\Livewire\Adm\Bitacora::class)->name('adm.bitacora');
    Route::get('/adm/usuarios', \App\Http\Livewire\Adm\Usuarios::class)->name('adm.usuarios');
    Route::get('/adm/empresas', \App\Http\Livewire\Adm\Empresas::class)->name('adm.empresas');

});


//COMPANY ROUTES
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/{empresa}/dashboard',\App\Http\Livewire\Empresa\Dashboard::class)->name('emp.dashboard');
    Route::get('/productos/categorias', CategoriasTable::class)->name('categorias');
    Route::get('/productos/marcas', \App\Http\Livewire\Empresa\Productos\MarcasTable::class)->name('marcas');
    Route::get('/productos/garantias', \App\Http\Livewire\Empresa\Productos\GarantiasTable::class)->name('garantias');
    Route::get('/productos/promociones', \App\Http\Livewire\Empresa\Productos\PromocionesTable::class)->name('promociones');
    Route::get('/productos', ProductosTable::class)->name('productos');
    Route::get('/bitacora', \App\Http\Livewire\Empresa\Miembro\BitacoraTable::class)->name('bitacora');
    Route::get('/reportes', ShowReportes::class)->name('reportes');
    Route::get('/miembros', MiembrosTable::class)->name('miembros');
    Route::get('/productos/pendientes', EnviosPendientesTable::class)->name('envio.productos.pendientes');
    Route::get('/productos/realizados', EnviosRealizadosTable::class)->name('envio.productos.realizados');
});


//LOGIN ROUTES
Route::get('/', function () {return view('auth.login');})->name('/');
Route::post('/login',[\App\Http\Controllers\web\LoginController::class,'login']);
//VERIFICATION ROUTES
Route::get('/email/verify', function () {return view('auth.verify-email');})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {$request->fulfill();    return redirect('/start');})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {$request->user()->sendEmailVerificationNotification(); return back()->with('message', 'Verification link sent!');})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/verification/{id}', function ($id) {$user=\App\Models\User::find($id);$user->email_verified_at=Carbon::now('America/La_Paz')->toDateTimeString();$user->save();    return redirect('/');})->name('verification');

