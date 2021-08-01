<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\wisataRepository;
use App\Entities\Wisata;
use App\Validators\WisataValidator;

/**
 * Class WisataRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class WisataRepositoryEloquent extends BaseRepository implements WisataRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Wisata::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return WisataValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
