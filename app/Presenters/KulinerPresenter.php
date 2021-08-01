<?php

namespace App\Presenters;

use App\Transformers\KulinerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class KulinerPresenter.
 *
 * @package namespace App\Presenters;
 */
class KulinerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new KulinerTransformer();
    }
}
