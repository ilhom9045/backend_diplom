<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\Api\v1\MultiAnswerTestResource;
use App\Models\v1\MultipleAnswerTest;
use App\Models\v1\MultipleAnswerTestAnswer;
use App\Models\v1\SimpleTestAnswer;
use Illuminate\Http\Request;

class MultiAnswerTestController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subject_id = $request->get('subject_id');
        $subject_count = $request->get('test_count');
        $simple_tests = MultipleAnswerTest::all()->where('subject_id', '=', $subject_id)->random()->limit($subject_count)->get();
        return $this->setData(MultiAnswerTestResource::collection($simple_tests), "");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $answers = json_decode($request->getContent());
        if (isset($answers)) {
            $response = [];
            foreach ($answers as $answer) {
                $arr = [];
                foreach ($answer->answers as $item) {
                    $arr[] = MultipleAnswerTestAnswer::all()->where("id", $item->id)->first()->is_true == 1;
                }
                $response[] = $arr;
            }
            return $response;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
