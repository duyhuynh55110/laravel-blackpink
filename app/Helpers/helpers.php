<?php
use Illuminate\Pagination\LengthAwarePaginator;

if (!function_exists('jsonResponse')) {
    /**
     * format response json data
     *
     * @param $data
     * @param string $message
     * @param mixed $successStatus
     * @param int $status
     * @param string $locale
     * @return \Illuminate\Http\JsonResponse
     */
    function jsonResponse($data, $message = "Successfully", $successStatus = API_SUCCESS["success"], $status = 200, $locale = "en") {
        $base = [
            "status" => $status,
            "success" => $successStatus,
            "message" => __($message, [], $locale),
        ];

        if($data instanceof LengthAwarePaginator) {
            $data = $data->toArray();
        } else {
            $data = [
                "data" => $data,
            ];
        }

        return response()->json(array_merge($base, $data), $status);
    }
}
