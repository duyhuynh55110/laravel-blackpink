<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
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

    public function getCommentsRepliesByReplyId($reply_id, $length = LENGTH_PAGINATE) {

    }

    /**
     * Get comments by commentable_id (post_id, ...)
     *
     * @param $commentable_id
     * @param int $length
     * @return mixed
     */
    public function getCommentsById($commentable_id, $length = LENGTH_PAGINATE) {
        return $this->select([
            "id",
            "commentable_id",
            "reply_id",
            "title",
            "content",
            "created_at",
        ])
        ->with("replyComments")
        ->where([
            "commentable_id" => $commentable_id,
            "reply_id" => null,
        ])
        ->orderBy("created_at", "desc")
        ->paginate($length);
    }
}
