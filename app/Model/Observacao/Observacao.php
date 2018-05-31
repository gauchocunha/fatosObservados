<?php

namespace App\Model\Observacao;

use Illuminate\Database\Eloquent\Model;

class Observacao extends Model
{
    protected $table = 'observacoes';
    protected $fillable = [
        'idDentista',
        'dataObservacao',
        'observacao',
        ];
    static function rules() {
        return [
            'dataObservacao' => 'required',
            'observacao' => 'required',
        ];
    }

    static function messages() {
        return [
            'dataObservacao.required' => 'O campo "Data" é obrigatório.',
            'observacao.required' => 'O campo "Observação" é obrigatório.',
        ];
    }
}
