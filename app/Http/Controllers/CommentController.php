<?php

namespace App\Http\Controllers;

use App\Repositories\CommentRepositoryEloquent;
use Illuminate\Http\Request;
class CommentController extends BaseController
{
    private $commentRepo;

    /**
     * PostController constructor.
     *
     * @param CommentRepositoryEloquent $commentRepo
     */
    public function __construct(CommentRepositoryEloquent $commentRepo) {
        parent::__construct();
        $this->commentRepo = $commentRepo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request) {
        $comment = $this->commentRepo->create([
            "commentable_id" => $request->commentable_id,
            "reply_id" => ($request->has('reply_id') && $request->reply_id)? $request->reply_id: null,
            "title" => $request->title,
            "content" => $request->input("content"),
        ]);

        return response()->json([
            "success" => true,
            "data" => $comment,
        ]);
    }

    /**
     * Get comments reply 
     */
    public function getCommentsReplyByReplyId($reply_id) {
        return response()->json($this->commentRepo->getCommentsReplyByReplyId($reply_id), 200);
    }

    /**
     * Get comments by commentable_id
     *
     * @param $commentable_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCommentsById($commentable_id) {
        return response()->json($this->commentRepo->getCommentsById($commentable_id), 200);
    }
}
