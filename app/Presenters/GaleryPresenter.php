<?php

namespace App\Presenters;

use App\Transformers\GaleryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GaleryPresenter.
 *
 * @package namespace App\Presenters;
 */
class GaleryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GaleryTransformer();
    }
}
