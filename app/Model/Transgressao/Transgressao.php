<?php

namespace App\Model\Transgressao;

use Illuminate\Database\Eloquent\Model;

class Transgressao extends Model
{
    protected $table = 'transgressoes';
    protected $fillable = [
        'nome',
        'pontuacao',
        'tipo'
        ];
}
