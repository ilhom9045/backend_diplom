<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

abstract class BaseController extends Controller
{
    const status = "status";
    const data = "data";
    const message = "message";
    const userAnswer = "user_answers";

    protected $arr = [];

    protected $headers = [
        'max_age' => 600
    ];

    protected function setErrorMessage(string $message)
    {
        $this->arr[self::status] = false;
        $this->arr[self::message] = $message;
        return response()->json($this->arr);
    }

    protected function setData($data, $message)
    {
        $this->arr[self::status] = true;
        $this->arr[self::data] = $data;
        $this->arr[self::message] = $message;
        return response($this->arr)->withHeaders($this->headers);
    }

    protected function setDataWithHeader($data, $message, $headers)
    {
        $this->arr[self::status] = true;
        $this->arr[self::data] = $data;
        $this->arr[self::message] = $message;
        return response($this->arr)->withHeaders($headers);
    }
}
