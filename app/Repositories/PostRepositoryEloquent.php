<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Container\Container as Application;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PostRepository;
use App\Entities\Post;
use App\Validators\PostValidator;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
    /**
     * Get related posts with this post
     *
     * @param $post_id
     * @param int $limit
     * @return mixed
     */
    public function getRelatedPosts($post_id, $limit = 4) {
        return $this->limit($limit)->get();
    }

    /**
     * Get popular posts in day
     *
     * @param int $limit
     * @param string $direction
     * @return mixed
     */
    public function getPopularPostsInDay($limit = 6, $direction = "DESC") {
        return $this->orderBy("view_count", $direction)
                    ->limit($limit)
                    ->get();
    }

    /**
     * Get posts with paginate
     *
     * @param int $length
     * @param string[] $columns
     * @return mixed
     */
    public function getPostsPaginate($length = 10, $columns = ['*'])
    {
        return $this->orderBy("id", "desc")->paginate($length);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PostValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
