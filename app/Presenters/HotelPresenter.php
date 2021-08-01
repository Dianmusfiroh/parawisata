<?php

namespace App\Presenters;

use App\Transformers\HotelTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class HotelPresenter.
 *
 * @package namespace App\Presenters;
 */
class HotelPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HotelTransformer();
    }
}
