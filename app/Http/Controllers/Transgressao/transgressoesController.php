<?php

namespace App\Http\Controllers\Transgressao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUD;
use App\Model\Transgressao\Transgressao;

class transgressoesController extends Controller {

    private $operacoes;

    public function __construct() {
        $this->operacoes = new CRUD;
        $this->operacoes->objeto = new Transgressao;
    }

    public function cadastro() {
        $this->authorize('perfil',2);
        return view('transgressao.transgressao');
    }

    public function salvar(Request $request) {
        $this->authorize('perfil',2);
        return $this->operacoes->salvar($request);
    }

    public function selecionarPorNome(Request $request) {
        $this->authorize('perfil',2);
        return $this->operacoes->selecionarPorNome($request);
    }

    public function selecionarPorId($id) {
        $this->authorize('perfil',2);
        return $this->operacoes->selecionarPorId($id);
    }

    public function excluir(Request $request) {
        $this->authorize('perfil',2);
        return $this->operacoes->excluir($request);
    }

}
