<?php

namespace Verdade\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Prova extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'disciplina_id',
        'titulo',
        'data',
        'hora_inicio',
        'hora_final',
        'pontuacao',
        'notificar',
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

}
