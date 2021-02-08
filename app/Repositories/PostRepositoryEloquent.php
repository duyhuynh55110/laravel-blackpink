<?php

namespace App\Repositories;

use App\Repositories\Traits\RequestTrait;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Post;
use App\Validators\PostValidator;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
    use RequestTrait;

    /**
     * Get related posts with this post
     *
     * @param $post_id
     * @param int $limit
     * @return mixed
     */
    public function getRelatedPosts($post_id) {
        return $this->limit($this->_limit(4))->get();
    }

    /**
     * Get posts with paginate
     *
     * @param int $length
     * @param string[] $columns
     * @return mixed
     */
    public function getPosts($columns = ['*'])
    {
        $query = $this->select([
            "*",
            DB::raw("(SELECT COUNT(comments.id)
                    FROM comments
                    WHERE comments.commentable_id = posts.id
                ) as comments_count"),
            ]);

        // Sort
        $this->_sort($query);

        return $query->paginate($this->_limit());
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
