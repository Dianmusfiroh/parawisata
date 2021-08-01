<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Kuliner.
 *
 * @package namespace App\Entities;
 */
class Kuliner extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'kuliner';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'address',
        'menu',

        'info',
        'harga',
        'jarak',
        'pic1',
        'pic2',
        'pic3',
        'pic4'
        // => array()
    ];

}
