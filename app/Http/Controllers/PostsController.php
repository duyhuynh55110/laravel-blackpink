<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryEloquent;
use Illuminate\Http\Request;

class PostsController extends BaseController
{
    private $postRepo;

    /**
     * PostsController constructor.
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
    public function relatedPosts($id) {
        return jsonResponse($this->postRepo->getRelatedPosts($id));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return jsonResponse($this->postRepo->getPosts());
    }

    /**
     *  Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return jsonResponse($this->postRepo->find($id));
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
