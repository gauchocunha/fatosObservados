<?php

namespace App\Http\Controllers\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Model\Usuario\User;



class usuariosController extends Controller {

    public function cadastro() {
        return view('usuario.usuario');
    }

    public function senha() {
        return view('usuario.senha');
    }

    public function salvar(Request $request) {
        $this->authorize('perfil',3);
        $this->validate($request, User::rules(), User::messages());
        $inputs = $request->all();
        $id = $request->input('id');
        if ($id > 0) {
            //se tiver id faz update
            $registro = User::findOrFail($id);
            $registro->fill($inputs)->save();
        } else {
            //se não insere
            $inputs['password'] = bcrypt($request->input('email'));
            $registro = User::create($inputs);
        }
        if ($registro) {
            return $registro;
        } else {
            return 0;
        }
    }

    public function selecionarPorNome(Request $request) {
        $this->authorize('perfil',3);
        $nome = $request->input('txtBusca');
        $lista = User::where('name', 'LIKE', '%' . $nome . '%')->get();
        if (!$lista) {
            $lista = null;
        }
        return $lista;
    }

    public function selecionarPorId($id) {
        $this->authorize('perfil',3);
        $registro = User::findOrFail($id);
        return $registro;
    }

    public function excluir(Request $request) {
        $this->authorize('perfil',3);
        $id = $request->input('id');
        $registro = User::findOrFail($id);
        $registro->delete();
        return ($registro);
    }

    public function resetarSenha(Request $request) {
        $this->authorize('perfil',3);
        $inputs = $request->all();
        $id = $request->input('id');
        $inputs['password'] = bcrypt($request->input('email'));
        $registro = User::findOrFail($id);
        $registro->fill($inputs)->save();
        return($registro);
    }

     public function alterarSenha(Request $request) {
        $inputs = $request->all();
        $inputs['password'] = bcrypt($request->input('password'));
        $registro = User::findOrFail(Auth::user()->id);
        $registro->fill($inputs)->save();
        return($registro);
    }
}