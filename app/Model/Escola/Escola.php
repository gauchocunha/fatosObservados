<?php
namespace App\Model\Escola;
use Illuminate\Database\Eloquent\Model;
class Escola extends Model {
    protected $table = 'escolas';
    protected $fillable = [
        'subordinacao',
        'nome',
        'decreto',
        'diretor',
        'email',
        'telefoneEscola',
        'telefoneDiretor',
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'uf',
        'numero',
        'complemento'
    ];
    static function rules() {
        return [
            'subordinacao' => 'required|min:3|max:100',
            'nome' => 'required|min:3|max:100',
            'decreto' => 'required|min:3|max:100',
            'diretor' => 'required|min:3|max:100',
            'email' => 'required|min:3|max:100',
            'telefoneEscola' => 'required|max:15',
            'telefoneDiretor' => 'required|max:15',
            'cep' => 'required',
            'logradouro' => 'required|min:3|max:100',
            'bairro' => 'required|min:3|max:100',
            'cidade' => 'required|min:3|max:100',
            'uf' => 'required|max:2',
            'numero' => 'required|max:10',
        ];
    }
    static function messages() {
        return [
            'subordinacao.required' => 'O campo "Subordinação" é obrigatório.',
            'subordinacao.min' => 'O campo "Subordinação" deve ter no min. 3 caracteres.',
            'subordinacao.max' => 'O campo "Subordinação" deve ter no max. 100 caracteres.',
            'nome.required' => 'O campo "Nome" é obrigatório.',
            'nome.min' => 'O campo "Nome" deve ter no min. 3 caracteres.',
            'nome.max' => 'O campo "Nome" deve ter no max. 100 caracteres.',
            'decreto.required' => 'O campo "Decreto" é obrigatório.',
            'decreto.min' => 'O campo "Decreto" deve ter no min. 3 caracteres.',
            'decreto.max' => 'O campo "Decreto" deve ter no max. 100 caracteres.',
            'diretor.required' => 'O campo "Diretor" é obrigatório.',
            'diretor.min' => 'O campo "Diretor" deve ter no min. 3 caracteres.',
            'diretor.max' => 'O campo "Diretor" deve ter no max. 100 caracteres.',
            'email.required' => 'O campo "e-mail" é obrigatório.',
            'email.min' => 'O campo "e-mail" deve ter no min. 3 caracteres.',
            'email.max' => 'O campo "e-mail" deve ter no max. 100 caracteres.',
            'telefoneEscola.required' => 'O campo "Telefone da escola" é obrigatório.',
            'telefoneEscola.max' => 'O campo "Telefone da escola" deve ter no max. 100 caracteres.',
            'telefoneDiretor.required' => 'O campo "Telefone do diretor" é obrigatório.',
            'telefoneDiretor.max' => 'O campo "Telefone do diretor" deve ter no max. 100 caracteres.',
            'cep.required' => 'O campo "CEP" é obrigatório.',
            'logradouro.required' => 'O campo "Logradouro" é obrigatório.',
            'logradouro.min' => 'O campo "Logradouro" deve ter no min. 3 caracteres.',
            'logradouro.max' => 'O campo "Logradouro" deve ter no max. 100 caracteres.',
            'bairro.required' => 'O campo "Bairro" é obrigatório.',
            'bairro.min' => 'O campo "Bairro" deve ter no min. 3 caracteres.',
            'bairro.max' => 'O campo "Bairro" deve ter no max. 100 caracteres.',
            'cidade.required' => 'O campo "Cidade" é obrigatório.',
            'cidade.min' => 'O campo "Cidade" deve ter no min. 3 caracteres.',
            'cidade.max' => 'O campo "Cidade" deve ter no max. 100 caracteres.',
            'uf.required' => 'O campo "UF" é obrigatório.',
            'uf.max' => 'O campo "UF" deve ter no max. 2 caracteres.',
            'numero.required' => 'O campo "Número" é obrigatório.',
            'numero.max' => 'O campo "Número" deve ter no max. 10 caracteres.',
            'complemento.max' => 'O campo "Complemento" deve ter no max. 100 caracteres.',
        ];
    }
}