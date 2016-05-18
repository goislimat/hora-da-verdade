<?php

namespace Verdade\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password', 'tipo', 'curso_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function disciplinas()
    {
        return $this->belongsToMany(Disciplina::class, 'aluno_disciplinas', 'user_id', 'disciplina_id')->withPivot('periodo');
    }

    public function disciplinasNoSemestre()
    {
        return $this->disciplinas()->wherePivot('periodo', '=', date('Y') . '/' . ((date('m') > 6) ? '2': '1'))->withPivot('periodo');
    }
}
