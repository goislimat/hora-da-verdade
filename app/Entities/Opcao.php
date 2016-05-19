<?php

namespace Verdade\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Opcao extends Model implements Transformable
{
    use TransformableTrait;

	protected $table = 'opcoes';

    protected $fillable = [
		'texto',
		'ordem',
		'questao_id',
	];

}
