<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Wisata;

/**
 * Class WisataTransformer.
 *
 * @package namespace App\Transformers;
 */
class WisataTransformer extends TransformerAbstract
{
    /**
     * Transform the Wisata entity.
     *
     * @param \App\Entities\Wisata $model
     *
     * @return array
     */
    public function transform(Wisata $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
