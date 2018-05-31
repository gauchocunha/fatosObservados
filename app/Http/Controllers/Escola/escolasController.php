<?php
namespace App\Http\Controllers\Escola;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Form;
use App\Model\Escola\Escola;
use DB;
class escolasController extends Controller {
    public function cadastro() {
        //Essa classe form é que gera o html do formulario,
        //Passei os parametros nos comentarios da tabela,
        //são três, o tipo de elemento, se é texto ou combo com Sim e Nao, o label e o placeholder
        //sepearados por virgula mas podemos colocar mais alguma coisa se não quiser capturar o campo
        //é só deixar o comentario em branco
        $html = Form::geraHtml('escolas');
        return view('escola.escola', compact('html'));
    }
    public function salvar(Request $request) {
        try {
            $inputs = $request->all();
            $id = $request->input('id');
            if ($id > 0) {
                //se tiver id faz update
                $registro = Escola::findOrFail($id);
                $registro->fill($inputs)->save();
            } else {
                //se não insere
                $registro = Escola::create($inputs);
            }
            return $registro;
        } catch (PDOException $e) {
            throw new PDOException($e->getCode());
        }
    }
    public function selecionarPorNome(Request $request) {
        try {
            $nome = $request->input('txtBusca');
            $lista = Escola::where('nome', 'LIKE', '%' . $nome . '%')->get();
            if (!$lista) {
                $lista = null;
            }
            return $lista;
        } catch (PDOException $e) {
            throw new PDOException($e->getCode());
        }
    }
    public function selecionarPorId($id) {
        try {
            $registro = Escola::findOrFail($id);
            return $registro;
        } catch (PDOException $e) {
            throw new PDOException($e->getCode());
        }
    }
    public function excluir(Request $request) {
        try {
            $id = $request->input('id');
            $registro = Escola::findOrFail($id);
            $registro->delete();
            return $registro;
        } catch (PDOException $e) {
            throw new PDOException($e->getCode());
        }
    }
}