<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Hotel;

/**
 * Class HotelTransformer.
 *
 * @package namespace App\Transformers;
 */
class HotelTransformer extends TransformerAbstract
{
    /**
     * Transform the Hotel entity.
     *
     * @param \App\Entities\Hotel $model
     *
     * @return array
     */
    public function transform(Hotel $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
