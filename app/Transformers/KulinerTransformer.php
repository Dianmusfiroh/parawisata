<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Kuliner;

/**
 * Class KulinerTransformer.
 *
 * @package namespace App\Transformers;
 */
class KulinerTransformer extends TransformerAbstract
{
    /**
     * Transform the Kuliner entity.
     *
     * @param \App\Entities\Kuliner $model
     *
     * @return array
     */
    public function transform(Kuliner $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
