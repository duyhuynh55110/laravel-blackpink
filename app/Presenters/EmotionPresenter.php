<?php

namespace App\Presenters;

use App\Transformers\EmotionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EmotionPresenter.
 *
 * @package namespace App\Presenters;
 */
class EmotionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EmotionTransformer();
    }
}
