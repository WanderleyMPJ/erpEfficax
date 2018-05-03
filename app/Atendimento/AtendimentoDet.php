<?php

namespace App\Atendimento;

use Illuminate\Database\Eloquent\Model;

class AtendimentoSolicitacaoMov extends Model
{
    protected $table = 'atendimentos_det';
    protected $fillable = ['atendimento_id', 'atendente_id', 'movimentacao', 'data'];

    public function atendimento()
    {
        return $this->hasMany('App\Atendimento\Atendimento');
    }
    public function atendente()
    {
        return $this->belongsTo('App\User');
    }

}