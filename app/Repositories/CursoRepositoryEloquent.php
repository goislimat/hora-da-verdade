<?php

namespace Verdade\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Verdade\Repositories\CursoRepository;
use Verdade\Entities\Curso;
use Verdade\Validators\CursoValidator;

/**
 * Class CursoRepositoryEloquent
 * @package namespace Verdade\Repositories;
 */
class CursoRepositoryEloquent extends BaseRepository implements CursoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Curso::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
