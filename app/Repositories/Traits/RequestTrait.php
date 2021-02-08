<?php

namespace App\Repositories\Traits;

trait RequestTrait
{
    /**
     * Sort & order by request from customers
     *
     * @param $query
     * @param array $sortDefault
     */
    function _sort(&$query, $sortDefault = [])
    {
        $query->when(request("sort", null), function ($q) {
            $sorts = explode(",", request("sort"));

            foreach ($sorts as $sort) {
                $sortBy = $sort;
                $orderBy = "asc";

                // check is "ASC" or "DESC"
                if (preg_match('/[-]+/', $sort)) {
                    $sortBy = str_replace('-', '', $sort);
                    $orderBy = "desc";
                }
                $q->orderBy($sortBy, $orderBy);
            }
        })
            ->when(!request("sort", null) && $sortDefault, function ($q) use ($sortDefault) {
                // Default sort
                $q->orderBy($sortDefault[0], $sortDefault[1]);
            });
    }

    /**
     * Limit in query and can be request by customers
     *
     * @param int $limit
     * @return array|\Illuminate\Http\Request|string
     */
    function _limit($limit = PER_PAGE_10)
    {
        return request('limit', $limit);
    }
}
