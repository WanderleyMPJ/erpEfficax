<?php

namespace App\Atendimento;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class AtendimentoOrigem extends Model
{
    use Eloquence;

    protected $searchableColumns = ['descricao'];

    protected $fillable = ['descricao'];
    
    protected $table = 'Atendimento_Origens';
}
