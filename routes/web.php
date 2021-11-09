<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\TarefasController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//Route::view('/','welcome');
Route::view('/teste','teste');

// Route::get('/user/{name}', function($name){
//  echo "mostrando usuario de nome ".$name;
// })->where('name','[a-z]+');
// Route::get('/user/{id}', function($id){
//  echo "mostrando o id de numero ".$id;
// });
Route::prefix('/config')->group(function(){

    Route::get('/', [ConfigController::class, 'index']);
    Route::get('/info', [ConfigController::class, 'info']);
    Route::get('/permissoes',[ConfigController::class, 'permissoes']);
});

Route::prefix('/tarefas')->group(function(){
   
    Route::get('/', [TarefasController::class, 'list'])->name('tarefas.list'); //listagem de tarefas
    Route::get('add', [TarefasController::class,'add'])->name('tarefas.add');// tela de adição
    Route::post('add',[TarefasController::class,'addAction']);//ação de adição
    Route::get('edit/{id}',[TarefasController::class,'edit'])->name('tarefas.edit');//tela de edição
    Route::post('edit/{id}',[TarefasController::class,'editAction']); // ação de edição
    Route::get('delete/{id}',[TarefasController::class,'del'])->name('tarefas.del'); // ação de deletar
    Route::get('marcar/{id}', [TarefasController::class,'done'])->name('tarefas.done'); // marcar resolvido ou nao

});


Route::fallback(function(){
 return view('404');
});
