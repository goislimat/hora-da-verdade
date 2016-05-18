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

    public function alunos()
    {
        return $this->hasMany(User::class)->orderBy('nome');
    }

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class)->orderBy('semestre')->orderBy('nome');
    }
}
