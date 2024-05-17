<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = ['nome', 'crm', 'especialidade'];

    public function atendimentos()
    {
        return $this->hasMany(Atendimento::class);
    }

}
