<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Smsapi;

/**
 * Class SmsapiTransformer.
 *
 * @package namespace App\Transformers;
 */
class SmsapiTransformer extends TransformerAbstract
{
    /**
     * Transform the Smsapi entity.
     *
     * @param \App\Entities\Smsapi $model
     *
     * @return array
     */
    public function transform(Smsapi $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
