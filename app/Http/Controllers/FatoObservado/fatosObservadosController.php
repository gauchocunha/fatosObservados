<?php
namespace App\Http\Controllers\FatoObservado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUD;
use App\Model\Transgressao\Transgressao;
use App\Model\Estudante\Estudante;
use App\Model\FatoObservado\FatoObservado;
use App\Model\Numeracao\Numeracao;
use DB;
use App\Http\Controllers\ConverteData\ConverteData;
class fatosObservadosController extends Controller {
    private $operacoes;
    public function __construct() {
        $this->operacoes = new CRUD;
        $this->operacoes->objeto = new FatoObservado;
    }
    public function cadastro() {
        $this->authorize('perfil', 2);
        $estudantes = Estudante::all()->sortBy("nome");
        $transgressoes = Transgressao::all()->sortBy("nome");
        return view('fatoObservado.fatoObservado', compact('estudantes', 'transgressoes'));
    }
    public function salvar(Request $request) {
        $this->authorize('perfil', 2);
        //$this->validate($request, Protesto::rules(), Protesto::messages());
        $inputs = $request->all();
        $inputs['data'] = ConverteData::ptParaEn($inputs['data']);
        $request->replace($inputs);
        return $this->operacoes->salvar($request);
    }
    public function selecionarProtestosPorDentista(Request $request) {
        $this->authorize('perfil', 2);
        $id = $request->input('idDentista');
        $lista = vwProtesto::where('idDentista', '=', $id)->get();
        if (!$lista) {
            $lista = null;
        }
        return $lista;
    }
    public function retornarNumero(Request $request) {
        $this->authorize('perfil', 2);
        $ano = date('Y');
        $estudante = Numeracao::where('idEstudante', '=', $request->input('idEstudante'))->where('ano', '=', $ano)->get();
       return $estudante[0]->numero;
    }
    public function retornarId(Request $request) {
        $this->authorize('perfil', 2);
        $ano = date('Y');
        $estudante = DB::table('numeracao')->where('numero', '=', $request->input('numero'))->where('ano', '=', $ano)->get();
        $quantos = count($estudante);
        if($quantos>0){
        return $estudante[0]->idEstudante;
        } else {
            return 'n';
        }
    }
    public function excluir(Request $request) {
        $this->authorize('perfil', 2);
        return $this->operacoes->excluir($request);
    }
    public function filtro() {
        $cartorios = vwCartorio::all()->sortBy("nome");
        $municipios = Municipio::all()->sortBy("nome");
        return view('relatorio.filtro', compact('cartorios', 'municipios'));
    }
    public function relatorio(Request $request) {
        $idCartorio = $request->input('idCartorio');
        $idMunicipio = $request->input('idMunicipio');
        $ano = $request->input('ano');
        $situacao = $request->input('situacao');
        if ($idCartorio || $idMunicipio || $ano || $situacao) {
            $parametros = 'where';
            if ($idCartorio) {
                $parametros .= " and idCartorio =  $idCartorio";
            }
            if ($idMunicipio) {
                $parametros .= " and idMunicipio = $idMunicipio";
            }
            if ($ano) {
                $parametros .= " and ano = $ano";
            }
            if ($situacao === 'p') {
                $parametros .= " and dataPagamento IS NOT NULL";
            }
            if ($situacao === 'a') {
                $parametros .= " and dataPagamento IS NULL";
            }
            $parametros = str_replace('where and', 'where', $parametros); //removendo a ocorrencia de where and e subistituindo por where
        } else {
            $parametros = '';
        }
        $protestos = DB::select('select * FROM vwRelatorio ' . $parametros . ' order by dataProtesto,municipio,nomeDentista');
        if ($protestos) {
            $total = DB::select('select sum(valor) as soma FROM vwRelatorio ' . $parametros);

            return \PDF::loadView('relatorio.relatorio', compact('protestos', 'total'))
                            ->setPaper('a4', 'portrait')
                            ->download('protestos.pdf');


            //return view('relatorio.relatorio', compact('protestos', 'total'));
        } else {
            return '<div class="alert alert-warning"><h4>Não foi localizado nenhum registro que atenda a combinação especificada!<h4></div>';
        }
    }
    public function numeroParaNome($numero) {
        switch ($numero) {
            case "1": $y = "Janeiro";
                break;
            case "2": $y = "Fevereiro";
                break;
            case "3": $y = "Mar&ccedil;o";
                break;
            case "4": $y = "Abril";
                break;
            case "5": $y = "Maio";
                break;
            case "6": $y = "Junho";
                break;
            case "7": $y = "Julho";
                break;
            case "8": $y = "Agosto";
                break;
            case "9": $y = "Setembro";
                break;
            case "10": $y = "Outubro";
                break;
            case "11": $y = "Novembro";
                break;
            case "12": $y = "Dezembro";
                break;
            default : $y = "?";
                break;
        }
        return $y;
    }
    public function cartaAnuencia(Request $request) {
        $cro = Cro::where('id', '=', 1)->get();
        $idDentista = $request->input('idDentista');
        $dentista = Dentista::where('id', '=', $idDentista)->get();
        $idProtesto = $request->input('id');
        $x = explode("+", $request->input('usuario'));
        $usuario = strtoupper($x[0]);
        $funcao = strtoupper($x[1]);
        $protesto = Protesto::where('id', '=', $idProtesto)->get();
        $valorExtenso = strtoupper(numeroExtenso::valorPorExtenso(numeroExtenso::removerFormatacaoNumero($protesto[0]->valorProtestado), TRUE, FALSE));
        $mes = $this->numeroParaNome(date('m'));
        $data = date('d') . " de " . $mes . " de " . date('Y');

        return \PDF::loadView('relatorio.cartaAnuencia', compact('cro', 'data', 'dentista', 'protesto', 'valorExtenso', 'usuario', 'funcao'))
                        ->setPaper('a4', 'portrait')
                        ->download('cartaAnuenciaCDANr' . $protesto[0]->cda . '.pdf');
        //return view('relatorio.cartaAnuencia', compact('data', 'dentista', 'protesto', 'valorExtenso','usuario','funcao'));
    }
}