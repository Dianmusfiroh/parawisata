<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\kulinerRepository;
use App\Entities\Kuliner;
use App\Validators\KulinerValidator;

/**
 * Class KulinerRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class KulinerRepositoryEloquent extends BaseRepository implements KulinerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Kuliner::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return KulinerValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
