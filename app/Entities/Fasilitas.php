<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Fasilitas.
 *
 * @package namespace App\Entities;
 */
class Fasilitas extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    protected $table = 'fasilitas';
    public $timestamps = false;

    public function hotel()
    {
        return $this->hasMany(Hotel::class);
}
}
