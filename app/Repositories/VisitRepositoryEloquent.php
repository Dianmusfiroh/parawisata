<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\visitRepository;
use App\Entities\Visit;
use App\Validators\VisitValidator;

/**
 * Class VisitRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VisitRepositoryEloquent extends BaseRepository implements VisitRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Visit::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return VisitValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
