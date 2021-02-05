<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
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
     * Get comments by commentable_id (post_id, ...)
     *
     * @param Request $request
     * @param $commentable_id
     * @param int $length
     * @return mixed
     */
    public function getCommentsById($commentable_id, $length = LENGTH_PAGINATE) {
        return $this->select([
            "comments.id",
            "commentable_id",
            "reply_id",
            "title",
            "content",
            "comments.created_at",
            DB::raw("(
                SELECT COUNT(reply_id)
                FROM comments c2
                WHERE c2.reply_id = comments.id
            ) as replies_count"),
            DB::raw("COUNT(likes.likeable_id) as likes_count"),
            DB::raw("GROUP_CONCAT(DISTINCT(likes.type) ORDER BY likes.type DESC) as likes_type"),
        ])
            ->leftJoin("likes", "likes.likeable_id", "=", "comments.id")
            ->where([
                "commentable_id" => $commentable_id,
            ])
            ->where(function ($q) {
                if(\request()->has('reply_id')) {
                    return $q->where('reply_id', \request()->get('reply_id'));
                } else {
                    return $q->whereNull('reply_id');
                }
            })
            ->groupBy('comments.id')
            ->orderBy("created_at", "desc")
            ->paginate($length);
    }
}
