<?php

namespace Verdade\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Verdade\Repositories\QuestaoRepository;
use Verdade\Entities\Questao;
use Verdade\Validators\QuestaoValidator;

/**
 * Class QuestaoRepositoryEloquent
 * @package namespace Verdade\Repositories;
 */
class QuestaoRepositoryEloquent extends BaseRepository implements QuestaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Questao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
