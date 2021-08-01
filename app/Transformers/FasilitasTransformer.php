<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Fasilitas;

/**
 * Class FasilitasTransformer.
 *
 * @package namespace App\Transformers;
 */
class FasilitasTransformer extends TransformerAbstract
{
    /**
     * Transform the Fasilitas entity.
     *
     * @param \App\Entities\Fasilitas $model
     *
     * @return array
     */
    public function transform(Fasilitas $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
