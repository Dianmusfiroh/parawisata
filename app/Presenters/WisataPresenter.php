<?php

namespace App\Presenters;

use App\Transformers\WisataTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WisataPresenter.
 *
 * @package namespace App\Presenters;
 */
class WisataPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WisataTransformer();
    }
}
