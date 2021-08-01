<?php

namespace App\Presenters;

use App\Transformers\FasilitasTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FasilitasPresenter.
 *
 * @package namespace App\Presenters;
 */
class FasilitasPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FasilitasTransformer();
    }
}
