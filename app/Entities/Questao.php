<?php

namespace Verdade\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Questao extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'questoes';

    protected $fillable = [
        'provas_id',
        'pergunta',
        'ordem',
        'tipo',
        'peso',
    ];

    public function prova()
    {
        return $this->belongsTo(Prova::class);
    }

}
