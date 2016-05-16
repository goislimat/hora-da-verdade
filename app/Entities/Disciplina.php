<?php

namespace Verdade\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Disciplina extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome',
        'semestre',
        'curso_id',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    /**
     * @return $this
     */
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'aluno_disciplinas', 'disciplina_id', 'user_id')->withPivot('periodo');
    }
}
