<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\Api\v1\SimpleTestResource;
use App\Models\v1\SimpleTest;
use Illuminate\Http\Request;

class SimpleTestController extends BaseController
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
        $simple_tests = SimpleTest::all()->where('subject_id', '=', $subject_id)->random($subject_count);
        return SimpleTestResource::collection($simple_tests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        //
//        $create_simple_text = SimpleTest::create($request->validate());
//        return new SimpleTestResource($create_simple_text);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

    public function getSimpleTest(Request $request)
    {

    }

}
