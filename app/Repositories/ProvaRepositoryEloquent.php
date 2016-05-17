<?php

namespace Verdade\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Verdade\Repositories\ProvaRepository;
use Verdade\Entities\Prova;
use Verdade\Validators\ProvaValidator;

/**
 * Class ProvaRepositoryEloquent
 * @package namespace Verdade\Repositories;
 */
class ProvaRepositoryEloquent extends BaseRepository implements ProvaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Prova::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
