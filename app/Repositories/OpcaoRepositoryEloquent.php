<?php

namespace Verdade\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Verdade\Repositories\OpcaoRepository;
use Verdade\Entities\Opcao;
use Verdade\Validators\OpcaoValidator;

/**
 * Class OpcaoRepositoryEloquent
 * @package namespace Verdade\Repositories;
 */
class OpcaoRepositoryEloquent extends BaseRepository implements OpcaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Opcao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
