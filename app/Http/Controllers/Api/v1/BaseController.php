<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    const status = "status";
    const data = "data";
    const message = "message";
    const userAnswer = "user_answers";

    protected $arr = [];

    abstract function verify(Request $request);

    protected $headers = [
        'Cache-Control' => "public, max-age=60, only-if-cached,max-stale=" . 60 * 60,
    ];

    protected function setErrorMessage(string $message)
    {
        $this->arr[self::status] = false;
        $this->arr[self::message] = $message;
        return response($this->arr);
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
