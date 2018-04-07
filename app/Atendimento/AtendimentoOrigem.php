<?php

namespace App\Atendimento;

use Illuminate\Database\Eloquent\Model;

class AtendimentoOrigem extends Model
{
    protected $fillable = ['descricao'];
    
    protected $table = 'Atendimento_Origens';
}
