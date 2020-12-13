<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CommentRepository;
use App\Entities\Comment;
use App\Validators\CommentValidator;

/**
 * Class CommentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CommentRepositoryEloquent extends BaseRepository implements CommentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Comment::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CommentValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Get comments by post_id (foreign key commentable_id)
     *
     * @param $post_id
     */
    public function getPostCommentsById($post_id, $length = 5) {
        return $this->select([
            "id",
            "commentable_id",
            "reply_id",
            "title",
            "content",
            "created_at"
        ])
        ->with("replyComments")
        ->where("commentable_id", $post_id)
        ->orderBy("id", "desc")
        ->paginate($length);
    }
}
