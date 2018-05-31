<?php
namespace App\Http\Controllers\Numeracao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Numeracao\Numeracao;
use App\Model\Estudante\Estudante;
class numeracaoController extends Controller {
    public function cadastro() {
        $this->authorize('perfil', 3);
        $estudantes = Estudante::all()->sortBy('nome');
        return view('numeracao.numeracao', compact('estudantes'));
    }
    public function gerarNumeracao(Request $request) {
        $this->authorize('perfil', 3);
        $this->validate($request, Numeracao::rules(), Numeracao::messages());
        try {
            $ano = $request->input('ano');
            $numeros = Numeracao::where('ano', '=', $ano);
            $numeros->delete();
            $listaEstudantes = Estudante::where('ativo', '=', 's')->orderBy('nome')->get();
            $numero = 1;
            foreach ($listaEstudantes as $estudante) {
                $dados['idEstudante'] = $estudante->id;
                $dados['numero'] = $numero;
                $dados['ano'] = $ano;
                Numeracao::create($dados);
                $numero++;
            }
            return 'ok';
        } catch (Error $e) {
            return $e->get_message();
        }
    }
    public function adicionarNumeracaoParaUmEstudante(Request $request) {
        $this->authorize('perfil', 3);
        $this->validate($request, Numeracao::rules(), Numeracao::messages());
        try {
            $ano = $request->input('ano');
            $idEstudante = $request->input('idEstudante');
            $numero = Numeracao::max('numero')+1;
            $dados['idEstudante'] = $idEstudante;
            $dados['numero'] = $numero;
            $dados['ano'] = $ano;
            Numeracao::create($dados);
            return 'ok';
        } catch (Error $e) {
            return $e->get_message();
        }
    }
}