<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FasilitasRepository;
use App\Entities\Fasilitas;
use App\Validators\FasilitasValidator;

/**
 * Class FasilitasRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FasilitasRepositoryEloquent extends BaseRepository implements FasilitasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Fasilitas::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FasilitasValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
