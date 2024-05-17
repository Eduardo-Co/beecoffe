<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['nome', 'cpf', 'data_nascimento', 'email'];

    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class);
    }
}
        