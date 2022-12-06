<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DependentController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Dependent', [DependentController::class, 'index'])->name('Dependent.index');
Route::post('/Dependent', [DependentController::class, 'store'])->name('Dependent.store');
Route::get('/Dependent/{id}/edit', [DependentController::class, 'edit'])->name('Dependent.edit');
Route::post('/Dependent/Update', [DependentController::class, 'update'])->name('Dependents.update');
Route::delete('/Dependent/{id}/delete', [DependentController::class, 'destroy'])->name('Dependent.destroy');
Route::get('Kabupaten/{id}', function ($id) {
    $kabupaten = App\Models\Kabupaten::where('id_provinsi',$id)->get();
    return response()->json($kabupaten);
});
