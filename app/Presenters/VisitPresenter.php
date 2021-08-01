<?php

namespace App\Presenters;

use App\Transformers\VisitTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VisitPresenter.
 *
 * @package namespace App\Presenters;
 */
class VisitPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VisitTransformer();
    }
}
