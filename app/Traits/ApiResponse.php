<?php

namespace App\Traits;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;

trait ApiResponse
{
    public function sendResponse($result, $message)
    {
        return Response::json($this->makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json($this->makeError($error, [], $code));
    }

    public function makeResponse($message, $data)
    {
        return [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
    }

    /**
     * @param string $message
     * @param array  $data
     *
     * @return array
     */
    public function makeError($message, $data = [], $code)
    {
        $res = [
            'success' => false,
            'message' => $message,
            'code' => $code,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }
        return $res;
    }
}
