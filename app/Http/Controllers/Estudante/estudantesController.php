<?php

namespace App\Http\Controllers\Estudante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUD;
use App\Model\Estudante\Estudante;
use App\Model\Estudante\vwIdEstudante;


class estudantesController extends Controller {

    private $operacoes;

    public function __construct() {
        $this->operacoes = new CRUD;
        $this->operacoes->objeto = new Estudante;
    }

    public function cadastro() {
        $this->authorize('perfil', 2);
        return view('estudante.estudante');
    }

    public function salvar(Request $request) {
        $this->authorize('perfil', 2);
        $this->validate($request, Estudante::rules(), Estudante::messages());
        return $this->operacoes->salvar($request);
    }

    public function selecionarPorNome(Request $request) {
        $this->authorize('perfil', 2);
        $nome = $request->input('txtBusca');
        $lista = Estudante::where('nome', 'LIKE', '%' . $nome . '%')->get();
        if (!$lista) {
            $lista = null;
        }
        return $lista;
    }

    public function selecionarPorId($id) {
        $this->authorize('perfil', 2);
        return $this->operacoes->selecionarPorId($id);
    }

    public function excluir(Request $request) {
        $this->authorize('perfil', 2);
        return $this->operacoes->excluir($request);
    }
    public function retornarId(Request $request) {
        $this->authorize('perfil', 2);
        $ano = date('Y');
        $estudante = vwIdEstudante::where('numero', '=', $request->input('numero'))->where('ano', '=', $ano)->get();
        $quantos = count($estudante);
        if($quantos>0){
        return $estudante[0]->idEstudante;
        } else {
            return 'n';
        }
    }

}
