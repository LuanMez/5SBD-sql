<?php

use App\Http\Controllers\PassageiroController;

Route::get('/', function () {
    return view('index');  // Página inicial
});

Route::get('/passageiros', function () {
    return view('formulario');  // Formulário para digitar o código do voo
});

Route::post('/passageiros', [PassageiroController::class, 'buscarPassageiros']); // Processa o formulário de passageiros

Route::get('/passageiros/editar/{id}', [PassageiroController::class, 'editarPassageiro']);
Route::post('/passageiros/editar/{id}', [PassageiroController::class, 'atualizarPassageiro']);
Route::delete('/passageiros/excluir/{id}', [PassageiroController::class, 'excluirPassageiro']);

Route::get('/passageiros/criar/{codigo_voo}', [PassageiroController::class, 'criar']);

Route::get('/passageiros/{codigo_voo}', [PassageiroController::class, 'index']);

Route::post('/passageiros/salvar', [PassageiroController::class, 'salvar']);
