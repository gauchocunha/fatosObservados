<?php

namespace App\Model\Usuario;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'perfil',
        'ativo',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static function rules() {
        return [
            'name' => 'required|min:3|max:100',
            'perfil' => 'required',
            'ativo' => 'required',
            'email' => 'required|email',
        ];
    }

    static function messages() {
        return [
            'name.required' => 'O campo "Nome" é obrigatório.',
            'name.min' => 'O campo "Nome" deve ter no min. 3 caracteres.',
            'name.max' => 'O campo "Nome" deve ter no max. 100 caracteres.',
            'perfil.required' => 'O campo "Perfil" é obrigatório.',
            'ativo.required' => 'O campo "Ativo" é obrigatório.',
            'email.required' => 'O campo "e-mail" é obrigatório.',
            'email.email' => 'O e-mail informado não é válido.',
        ];
    }

}
