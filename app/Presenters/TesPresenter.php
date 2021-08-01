<?php

namespace App\Presenters;

use App\Transformers\TesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TesPresenter.
 *
 * @package namespace App\Presenters;
 */
class TesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TesTransformer();
    }
}
