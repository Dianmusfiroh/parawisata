<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Wisata.
 *
 * @package namespace App\Entities;
 */
class Wisata extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'wisata';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'address',
        'deskripsi',
        'jarak',
        'kategori_wisata_id',
        'pic1',
        'pic2',
        'pic3',
        'pic4'
    ];
    public function category()
    {
     return $this->belongsTo(Category::class);
    }

}
