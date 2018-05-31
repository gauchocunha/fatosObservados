<?php
namespace App\Model\Numeracao;
use Illuminate\Database\Eloquent\Model;
class Numeracao extends Model {
    protected $table = 'numeracao';
    protected $fillable = [
        'idEstudante',
        'numero',
        'ano',
    ];
    static function rules() {
        return [
            'ano' => 'required',
        ];
    }

    static function messages() {
        return [
            'ano.required' => 'O campo "Ano" é obrigatório.',
        ];
    }
}