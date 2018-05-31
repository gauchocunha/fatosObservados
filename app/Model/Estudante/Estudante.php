<?php

namespace App\Model\Estudante;

use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    protected $table = 'estudantes';
    protected $fillable = [
        'cpf',
        'nome',
        'nomeDeGuerra',
        'ativo'
        ];
    static function rules() {
        return [
            'cpf' => 'required',
            'nome' => 'required|min:3|max:100',
            'nomeDeGuerra' => 'required|min:3|max:100',
            'ativo' => 'required',
        ];
    }

    static function messages() {
        return [
            'cpf.required' => 'O campo "CPF" é obrigatório.',
            'nome.required' => 'O campo "Nome" é obrigatório.',
            'nome.min' => 'O campo "Nome" deve ter no min. 3 caracteres.',
            'nome.max' => 'O campo "Nome" deve ter no max. 100 caracteres.',
            'nomeDeGuerra.required' => 'O campo "Nome de guerra" é obrigatório.',
            'nomeDeGuerra.min' => 'O campo "Nome de guerra" deve ter no min. 3 caracteres.',
            'nomeDeGuerra.max' => 'O campo "Nome de guerra" deve ter no max. 100 caracteres.',
            'ativo.required' => 'O campo "Ativo" é obrigatório.',
        ];
    }
}
