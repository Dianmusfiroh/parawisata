<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\hotelRepository;
use App\Entities\Hotel;
use App\Validators\HotelValidator;

/**
 * Class HotelRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HotelRepositoryEloquent extends BaseRepository implements HotelRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Hotel::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return HotelValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
