<?php

namespace App\Http\Controllers\Relatorio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Numeracao\vwNumeracao;
use App\Model\Escola\Escola;
use App\Model\Estudante\Estudante;
use DB;

class relatoriosController extends Controller
{
    public function filtro() {
       $estudantes = Estudante::all()->sortBy("nome");
      //  $municipios = Municipio::all()->sortBy("nome");
        return view('relatorio.filtro', compact('estudantes'));
    }

    public function relAlteracoes(Request $request) {
        $escola = Escola::where('id', '=', '1')->get();
        $idEstudante = $request->input('idEstudante');

        $elogios = DB::select('select * FROM vwFatosObservados WHERE idEstudante = ' . $idEstudante . ' and tipo = 1 order by data');
        $transgressoes = DB::select('select * FROM vwFatosObservados WHERE idEstudante = ' . $idEstudante . ' and tipo = 2 order by data');
        if ($elogios || $transgressoes) {
             return \PDF::loadView('relatorio.relAlteracoes', compact('elogios', 'transgressoes', 'escola'))
                        ->setPaper('a4', 'portrait')
                        ->download('alteracoes.pdf');
        } else {
            return '<div class="alert alert-warning"><h4>Não foi localizado nenhum registro que atenda a combinação especificada!<h4></div>';
        }
    }

    public function relNumeracao() {
        $ano = date('Y');
        $escola = Escola::where('id', '=', '1')->get();
        $estudantes = vwNumeracao::where('ano', '=', $ano)->get();
        return \PDF::loadView('relatorio.relNumeracao', compact('escola','estudantes'))
                        ->setPaper('a4', 'portrait')
                        ->download('numeracao.pdf');
    }

}
