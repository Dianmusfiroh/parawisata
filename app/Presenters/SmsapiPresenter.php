<?php

namespace App\Presenters;

use App\Transformers\SmsapiTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SmsapiPresenter.
 *
 * @package namespace App\Presenters;
 */
class SmsapiPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SmsapiTransformer();
    }
}
