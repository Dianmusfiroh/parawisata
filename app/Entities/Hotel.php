<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Hotel.
 *
 * @package namespace App\Entities;
 */
class Hotel extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'address',
        'info',
        'harga',
        'jarak',
        'fasilitas',
        // 'fasilitas_id',
        'pic1',
        'pic2',
        'pic3',
        'pic4'



    ];
    protected $table = 'hotel';
    public $timestamps = false;
    public function setFasilitasAttribute($value)
    {
        $this->attributes['fasilitas'] = json_encode($value);
    }

    public function getFasilitasAttribute($value)
    {
        return $this->attributes['fasilitas'] = json_decode($value);
    }


    public function item()
    {
        return $this->hasMany(Item::class);
    }



}
