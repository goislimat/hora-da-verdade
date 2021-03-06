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
        'prova_id',
        'pergunta',
        'ordem',
        'tipo',
        'peso',
    ];

    public function prova()
    {
        return $this->belongsTo(Prova::class);
    }

    public function opcoes()
    {
        return $this->hasMany(Opcao::class)->orderBy('ordem');
    }

}
