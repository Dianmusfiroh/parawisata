<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\smsapiRepository;
use App\Entities\Smsapi;
use App\Validators\SmsapiValidator;

/**
 * Class SmsapiRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SmsapiRepositoryEloquent extends BaseRepository implements SmsapiRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Smsapi::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return SmsapiValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
