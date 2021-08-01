<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Relations\Concerns\InteractsWithPivotTable;

/**
 * Class Visit.
 *
 * @package namespace App\Entities;
 */
class Visit extends Model implements Transformable

// class Visit extends Model implements Viewable
{

    // use InteractsWithViews;
    use TransformableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['visit_count'];
    protected $table = 'views';
    public $timestamp = false;
}
