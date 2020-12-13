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
     */
    public function store(Request $request) {
        $this->commentRepo->create([
            "commentable_id" => $request->commentable_id,
            "reply_id" => ($request->has('reply_id'))? $request->reply_id: null,
            "title" => $request->title,
            "content" => $request->content,
        ]);

        return response()->json([
            "success" => true,
            "messasge" => "Add newly comment successfully"
        ]);
    }

    /**
     * Get comments belong to this posts
     */
    public function getPostCommentsById($post_id) {
        return response()->json($this->commentRepo->getPostCommentsById($post_id), 200);
    }
}
