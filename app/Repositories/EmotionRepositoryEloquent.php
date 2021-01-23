<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EmotionRepository;
use App\Entities\Emotion;
use App\Validators\EmotionValidator;

/**
 * Class EmotionRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EmotionRepositoryEloquent extends BaseRepository implements EmotionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Emotion::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return EmotionValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
