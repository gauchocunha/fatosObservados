<?php

namespace App\Http\Controllers\Observacao;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUD;
use App\Model\Observacao\Observacao;

class observacoesController extends Controller
{
    private $operacoes;

    public function __construct() {
        $this->operacoes = new CRUD;
        $this->operacoes->objeto = new Observacao;
    }


    public function salvar(Request $request) {
        $this->authorize('perfil',2);

        $this->validate($request, Observacao::rules(), Observacao::messages());
        return $this->operacoes->salvar($request);
    }

    public function selecionarObservacoesPorDentista(Request $request) {
        $this->authorize('perfil', 2);
        $id = $request->input('idDentista');
        $lista = Observacao::where('idDentista', '=', $id)->orderBy('dataObservacao')->get();
        if (!$lista) {
            $lista = null;
        }
        return $lista;
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
