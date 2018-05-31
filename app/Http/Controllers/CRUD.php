<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class CRUD extends Controller {
    public $objeto;
    public function salvar(Request $request) {
        $inputs = $request->all();
        $id = $request->input('id');
        if ($id > 0) {
            //se tiver id faz update
            $registro = $this->objeto::findOrFail($id);
            $registro->fill($inputs)->save();
        } else {
            //se não insere
            $registro = $this->objeto::create($inputs);
        }
        if ($registro) {
            return $registro;
        } else {
            return 0;
        }
    }
    public function selecionarPorNome(Request $request) {
        $nome = $request->input('txtBusca');
        $lista = $this->objeto::where('nome', 'LIKE', '%' . $nome . '%')->get();
        if (!$lista) {
            $lista = null;
        }
        return $lista;
    }
    public function selecionarPorId($id) {
        $registro = $this->objeto::findOrFail($id);
        return $registro;
    }
    public function excluir(Request $request) {
        $id = $request->input('id');
        $registro = $this->objeto::findOrFail($id);
        $registro->delete();
        return $registro;
    }
}