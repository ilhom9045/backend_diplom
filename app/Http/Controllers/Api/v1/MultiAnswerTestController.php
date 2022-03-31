<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\Api\v1\MultiAnswerTestResource;
use App\Models\v1\MultipleAnswerTest;
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
        $simple_tests = MultipleAnswerTest::all()->where('subject_id', '=', $subject_id)->random($subject_count);
        return MultiAnswerTestResource::collection($simple_tests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject_id = $request->get('subject_id');
        $subject_count = $request->get('test_count');
        $simple_tests = MultipleAnswerTest::all()->where('subject_id', '=', $subject_id)->random($subject_count);
        return MultiAnswerTestResource::collection($simple_tests);
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
