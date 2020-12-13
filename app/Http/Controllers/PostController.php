<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryEloquent;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    private $postRepo;

    /**
     * PostController constructor.
     * @param PostRepositoryEloquent $postRepo
     */
    public function __construct(PostRepositoryEloquent $postRepo) {
        parent::__construct();
        $this->postRepo = $postRepo;
    }

    /**
     * Display a listing related posts
     * 
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRelatedPosts($id) {
        return response()->json([
            "success" => API_SUCCESS["success"],
            "data" => $this->postRepo->getRelatedPosts($id)
        ], 200);
    }

    /**
     * Display a listing popular posts in day
     */
    public function getPopularPosts() {
        return response()->json($this->postRepo->getPopularPostsInDay(), 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->postRepo->getPostsPaginate(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     *  Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = $this->postRepo->find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
