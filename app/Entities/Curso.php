<?php

namespace Verdade\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Curso extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome',
        'tipo',
    ];

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class);
    }
}
