<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostRepository.
 *
 * @package namespace App\Repositories;
 */
interface PostRepository extends RepositoryInterface
{
    /**
     * Get post with paginate
     *
     * @param int $length
     * @return mixed
     */
    public function getPostsPaginate($length = 10);
}
