<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\GaleryRepository;
use App\Entities\Galery;
use App\Validators\GaleryValidator;

/**
 * Class GaleryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class GaleryRepositoryEloquent extends BaseRepository implements GaleryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Galery::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return GaleryValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
