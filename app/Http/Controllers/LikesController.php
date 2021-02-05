<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeCreateRequest;
use App\Repositories\LikeRepositoryEloquent;

/**
 * Class LikesController.
 *
 * @package namespace App\Http\Controllers;
 */
class LikesController extends BaseController
{
    private $likeRepo;
    public function __construct(LikeRepositoryEloquent $likeRepo)
    {
        $this->likeRepo = $likeRepo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LikeCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(LikeCreateRequest $request) {
        $like = $this->likeRepo->create([
            "user_id" => 1,
            "likeable_id" => $request->likeable_id,
            "likeable_type" => POLYMORPHISM_TYPES[$request->likeable_type],
            "type" => $request->has("type") && array_key_exists($request->type, LIKES_TYPES)? LIKES_TYPES[$request->type]: LIKES_TYPES["like"],
        ]);

        return response()->json([
            "success" => API_SUCCESS["success"],
            "data" => $like,
        ], 200);
    }
}
