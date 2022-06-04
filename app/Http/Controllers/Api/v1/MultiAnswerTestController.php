<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\MultiAnswerTestControllerStore;
use App\Http\Resources\Api\v1\MultiAnswerTestResource;
use App\Models\v1\MultipleAnswerTest;
use App\Models\v1\MultipleAnswerTestAnswer;
use App\Models\v1\SimpleTest;
use App\Models\v1\SimpleTestAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

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
        MultiAnswerTestResource::$subject_id = $subject_id;
        return $this->setData(MultiAnswerTestResource::collection($simple_tests), "");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MultiAnswerTestControllerStore $request)
    {
        $validateData = $request->validated();
        Schema::disableForeignKeyConstraints();
        MultipleAnswerTestAnswer::query()->truncate();
        MultipleAnswerTest::query()->truncate();
        Schema::enableForeignKeyConstraints();
        $multiplyTestReqData = $validateData['multiply_test'];
        $dataTimeNow = now();
        $multiplyTestData = [];
        foreach ($multiplyTestReqData as $items) {
            $multiply_test_items = [];
            $multiply_test_items['title'] = $items['title'];
            $multiply_test_items['status_id'] = $items['status_id'];
            $multiply_test_items['subject_id'] = $items['status_id'];
            $multiply_test_items['created_at'] = $dataTimeNow;
            $multiply_test_items['updated_at'] = $dataTimeNow;
            $multiplyTestData[] = $multiply_test_items;
        }
        $insertData = MultipleAnswerTest::query()->insert($multiplyTestData);

        $multiplyTestAnswerReqData = $validateData['multiply_test_answer'];
        $multiplyTestAnswerData = [];
        foreach ($multiplyTestAnswerReqData as $answer) {
            $multiply_test_items = [];
            $multiply_test_items['multiple_answer_test_id'] = $answer['multiple_answer_test_id'];
            $multiply_test_items['answer_body'] = $answer['answer_body'];
            $multiply_test_items['is_true'] = $answer['is_true'];
            $multiply_test_items['created_at'] = $dataTimeNow;
            $multiply_test_items['updated_at'] = $dataTimeNow;
            $multiplyTestAnswerData[] = $multiply_test_items;
        }
        $insertAnswerData = MultipleAnswerTestAnswer::query()->insert($multiplyTestAnswerData);
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

    function verify(Request $request)
    {
        $answers = json_decode($request->getContent());
        if (isset($answers)) {
            $response = [];
            foreach ($answers as $answer) {
                foreach ($answer->answers as $item) {
                    if ($item->id == -1) {
                        $a = [];
                        $a['isTrue'] = false;
                        $a['trueCount'] = 0;
                        $response[] = $a;
                    } else {
                        $i = MultipleAnswerTestAnswer::all()->where("id", $item->id)->first();
                        $trueTestCount = MultipleAnswerTestAnswer::all()
                            ->where('multiple_answer_test_id', $i->multiple_answer_test_id)
                            ->where('is_true', 1)->count();
                        $a = [];
                        $a['isTrue'] = $i->is_true == 1;
                        $a['trueCount'] = $trueTestCount;
                        $response[] = $a;
                    }
                }
            }
            return $this->setData($response, "");
        }
    }
}
