<?php

namespace App\Atendimento;

use Illuminate\Database\Eloquent\Model;

class AtendimentoDet extends Model
{
    protected $table = 'atendimentos_det';
    protected $fillable = ['atendimento_id', 'atendente_id', 'movimentacao', 'data'];
    protected $dates = ['data'];

    public function atendimento()
    {
        return $this->belongsTo('App\Atendimento\Atendimento');
    }
    public function atendente()
    {
        return $this->hasMany('App\User');
    }

}