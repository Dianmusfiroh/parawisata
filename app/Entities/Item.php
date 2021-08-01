<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Item.
 *
 * @package namespace App\Entities;
 */
class Item extends Model implements Transformable
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
        'harga',
        'hotel_id'
    ];

    protected $table = 'item';
    public $timestamps = false;

    public function hotel()
    {
    return $this->belongsTo(Hotel::class);
    }

}
