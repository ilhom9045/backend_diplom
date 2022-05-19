<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\SimpleTestStoreRequest;
use App\Http\Resources\Api\v1\SimpleTestResource;
use App\Models\v1\Languages;
use App\Models\v1\SimpleTest;
use App\Models\v1\SimpleTestAnswer;
use App\Models\v1\TestType;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

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
        $simple_tests = SimpleTest::all()->where('subject_id', '=', $subject_id)->random()->limit($subject_count)->get();
        SimpleTestResource::$subject_id = $subject_id;
        $simple_tests = SimpleTestResource::collection($simple_tests);
        return $this->setData($simple_tests, "");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SimpleTestStoreRequest $request)
    {
        $validateData = $request->validated();
        Schema::disableForeignKeyConstraints();
        SimpleTestAnswer::query()->truncate();
        SimpleTest::query()->truncate();
        Schema::enableForeignKeyConstraints();
        $simpleTestReqData = $validateData['simple_test'];
        $dataTimeNow = now();
        $simpleTestData = [];
        foreach ($simpleTestReqData as $items) {
            $simple_test_items = [];
            $simple_test_items['title'] = $items['title'];
            $simple_test_items['status_id'] = $items['status_id'];
            $simple_test_items['subject_id'] = $items['status_id'];
            $simple_test_items['created_at'] = $dataTimeNow;
            $simple_test_items['updated_at'] = $dataTimeNow;
            $simpleTestData[] = $simple_test_items;
        }
        $insertData = SimpleTest::query()->insert($simpleTestData);

        $simpleTestAnswerReqData = $validateData['simple_test_answer'];
        $simpleTestAnswerData = [];
        foreach ($simpleTestAnswerReqData as $answer) {
            $simple_test_items = [];
            $simple_test_items['simple_test_id'] = $answer['simple_test_id'];
            $simple_test_items['answer_body'] = $answer['answer_body'];
            $simple_test_items['is_true'] = $answer['is_true'];
            $simple_test_items['created_at'] = $dataTimeNow;
            $simple_test_items['updated_at'] = $dataTimeNow;
            $simpleTestAnswerData[] = $simple_test_items;
        }
        $insertAnswerData = SimpleTestAnswer::query()->insert($simpleTestAnswerData);
        if ($insertData === true && $insertAnswerData == true) {
            return $this->setData(true, "");
        } else {
            return $this->setErrorMessage("");
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

    function verify(Request $request)
    {
        $answers = json_decode($request->getContent());
        if (isset($answers)) {
            $arr = [];
            foreach ($answers as $answer) {
                $arr[] = SimpleTestAnswer::all()->where("id", $answer->id)->first()->is_true == 1;
            }
            return $this->setData($arr, "");
        }
    }
}
