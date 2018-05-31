<?php
namespace App\Model\FatoObservado;
use Illuminate\Database\Eloquent\Model;
class FatoObservado extends Model {
    protected $table = 'fatosObservados';
    protected $fillable = [
        'idEstudante',
        'idTransgressao',
        'data',
        'observacao'
    ];
    static function rules() {
        return [
            'idEstudante' => 'required',
            'idTransgressao' => 'required',
            'data' => 'required',
        ];
    }
    static function messages() {
        return [
            'idEstudante.required' => 'O campo "Estudante" é obrigatório.',
            'idTransgressao.required' => 'O campo "Transgressão" é obrigatório.',
            'data.required' => 'O campo "Data" é obrigatório.',
        ];
    }
}