<?php

namespace App\Http\Controllers;

use App\Repositories\CommentRepositoryEloquent;
use Illuminate\Http\Request;
class CommentsController extends BaseController
{
    private $commentRepo;

    /**
     * PostsController constructor.
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

        return jsonResponse($comment);
    }

    /**
     * Get comments by commentable_id
     *
     * @param $commentable_id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($commentable_id) {
        return jsonResponse($this->commentRepo->getCommentsById($commentable_id));
    }
}
