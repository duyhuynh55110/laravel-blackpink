<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Emotion;

/**
 * Class EmotionTransformer.
 *
 * @package namespace App\Transformers;
 */
class EmotionTransformer extends TransformerAbstract
{
    /**
     * Transform the Emotion entity.
     *
     * @param \App\Entities\Emotion $model
     *
     * @return array
     */
    public function transform(Emotion $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
