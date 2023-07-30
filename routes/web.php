<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\CocheController;
use App\Http\Livewire\ShowCoches;
use App\Http\Livewire\ShowFojaRutas;
use App\Http\Livewire\ShowDepbsas;
use App\Http\Livewire\ShowEmpresas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

/*Route::match(['get', 'head'], '/', function () {
    // Lógica de la ruta raíz para los métodos GET y HEAD
}); */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';

//Route::resource('coches',CocheController::class)->parameters(['coches'=>'coche'])->names('coches');

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', ShowCoches::class)->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/coches', ShowCoches::class)->name('coches.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/fojas', ShowFojaRutas::class)->name('fojas.show');

//Route::middleware(['auth:sanctum', 'verified'])->get('/empresas', CreateEmpresa::class)->name('empresas.create');

Route::middleware(['auth:sanctum', 'verified'])->get('/empresas', ShowEmpresas::class)->name('empresas.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/depbsas', ShowDepbsas::class)->name('depbsas.show');
