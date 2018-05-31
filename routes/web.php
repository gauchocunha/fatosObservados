<?php

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
    return view('auth.login');
});

Route::get('/naoAutorizado', function () {return view('acessoNaoAutorizado');});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rotas para manipular os usuários
Route::group(['prefix' => 'usuario', 'middleware' => 'auth'], function () {
Route::get('cadastro', 'Usuario\usuariosController@cadastro');
Route::get('senha', 'Usuario\usuariosController@senha');
Route::post('salvar', 'Usuario\usuariosController@salvar');
Route::get('selecionarPorNome', 'Usuario\usuariosController@selecionarPorNome');
Route::get('selecionarPorId/{id}', 'Usuario\usuariosController@selecionarPorId');
Route::post('resetarSenha', 'Usuario\usuariosController@resetarSenha');
Route::post('alterarSenha', 'Usuario\usuariosController@alterarSenha');
Route::delete('excluir', 'Usuario\usuariosController@excluir');
});

//Rotas para manipular a numeracao
Route::group(['prefix' => 'numeracao', 'middleware' => 'auth'], function () {
Route::get('cadastro', 'Numeracao\numeracaoController@cadastro');
Route::post('gerarNumeracao', 'Numeracao\numeracaoController@gerarNumeracao');
Route::post('adicionarNumeracao', 'Numeracao\numeracaoController@adicionarNumeracaoParaUmEstudante');
Route::get('selecionarPorId/{id}', 'Cro\croController@selecionarPorId');
});

//Rotas para manipular as transgressoes
Route::group(['prefix' => 'transgressao', 'middleware' => 'auth'], function () {
Route::get('cadastro', 'Transgressao\transgressoesController@cadastro');
Route::post('salvar', 'Transgressao\transgressoesController@salvar');
Route::get('selecionarPorNome', 'Transgressao\transgressoesController@selecionarPorNome');
Route::get('selecionarPorId/{id}', 'Transgressao\transgressoesController@selecionarPorId');
Route::delete('excluir', 'Transgressao\transgressoesController@excluir');
});

//Rotas para manipular as escolas
Route::group(['prefix' => 'escola', 'middleware' => 'auth'], function () {
Route::get('cadastro', 'Escola\escolasController@cadastro');
Route::post('salvar', 'Escola\escolasController@salvar');
Route::get('selecionarPorNome', 'Escola\escolasController@selecionarPorNome');
Route::get('selecionarPorId/{id}', 'Escola\escolasController@selecionarPorId');
Route::delete('excluir', 'Escola\escolasController@excluir');
});

//Rotas para manipular os estudantes
Route::group(['prefix' => 'estudante', 'middleware' => 'auth'], function () {
Route::get('cadastro', 'Estudante\estudantesController@cadastro');
Route::post('salvar', 'Estudante\estudantesController@salvar');
Route::get('selecionarPorNome', 'Estudante\estudantesController@selecionarPorNome');
Route::get('selecionarPorId/{id}', 'Estudante\estudantesController@selecionarPorId');
Route::get('retornarId', 'Estudante\estudantesController@retornarId');
Route::delete('excluir', 'Estudante\estudantesController@excluir');
});

//Rotas para manipular os fatos observados
Route::group(['prefix' => 'fatoObservado', 'middleware' => 'auth'], function () {
Route::get('cadastro', 'FatoObservado\fatosObservadosController@cadastro');
Route::post('salvar', 'FatoObservado\fatosObservadosController@salvar');
Route::post('retornarNumero', 'FatoObservado\fatosObservadosController@retornarNumero');
Route::post('retornarId', 'FatoObservado\fatosObservadosController@retornarId');
Route::get('selecionarProtestosPorDentista', 'Protesto\protestosController@selecionarProtestosPorDentista');
Route::get('selecionarPorId/{id}', 'Protesto\protestosController@selecionarPorId');
});

//Rotas para manipular os relatorios
Route::group(['prefix' => 'relatorio', 'middleware' => 'auth'], function () {
Route::get('relNumeracao', 'Relatorio\relatoriosController@relNumeracao');
Route::get('relAlteracoes', 'Relatorio\relatoriosController@relAlteracoes');
Route::get('filtro', 'Relatorio\relatoriosController@filtro');
});

//Rotas para manipular as observacoes
Route::group(['prefix' => 'observacao', 'middleware' => 'auth'], function () {
Route::post('salvar', 'Observacao\observacoesController@salvar');
Route::get('selecionarObservacoesPorDentista', 'Observacao\observacoesController@selecionarObservacoesPorDentista');
Route::get('selecionarPorId/{id}', 'Observacao\observacoesController@selecionarPorId');
Route::delete('excluir', 'Observacao\observacoesController@excluir');
});

//Rotas para manipular as observacoes
Route::group(['prefix' => 'ajuda', 'middleware' => 'auth'], function () {
Route::get('/ajuda', function () {return view('ajuda/ajuda');});
});
