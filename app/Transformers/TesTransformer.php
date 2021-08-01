<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Tes;

/**
 * Class TesTransformer.
 *
 * @package namespace App\Transformers;
 */
class TesTransformer extends TransformerAbstract
{
    /**
     * Transform the Tes entity.
     *
     * @param \App\Entities\Tes $model
     *
     * @return array
     */
    public function transform(Tes $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
