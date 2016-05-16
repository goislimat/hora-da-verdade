<?php

namespace Verdade\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Verdade\Repositories\DisciplinaRepository;
use Verdade\Entities\Disciplina;
use Verdade\Validators\DisciplinaValidator;

/**
 * Class DisciplinaRepositoryEloquent
 * @package namespace Verdade\Repositories;
 */
class DisciplinaRepositoryEloquent extends BaseRepository implements DisciplinaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Disciplina::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
