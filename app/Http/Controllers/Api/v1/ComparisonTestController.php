<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\ComparisonTestControllerStore;
use App\Http\Resources\Api\v1\ComparisonTestResource;
use App\Models\v1\ComparisonOptionAnswer;
use App\Models\v1\ComparisonOptionQuestion;
use App\Models\v1\ComparisonTest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ComparisonTestController extends BaseController
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
        $simple_tests = ComparisonTest::all()->where('subject_id', '=', $subject_id)->random()->limit($subject_count)->get();
        ComparisonTestResource::$subject_id = $subject_id;
        return $this->setData(ComparisonTestResource::collection($simple_tests), "");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComparisonTestControllerStore $request)
    {
        $validateData = $request->validated();
        Schema::disableForeignKeyConstraints();
        ComparisonTest::query()->truncate();
        ComparisonOptionQuestion::query()->truncate();
        ComparisonOptionAnswer::query()->truncate();
        Schema::enableForeignKeyConstraints();
        $comparison_test = $validateData['comparison_test'];
        $dataTimeNow = now();
        $multiplyTestData = [];
        foreach ($comparison_test as $items) {
            $comparison_test_items = [];
            $comparison_test_items['title'] = $items['title'];
            $comparison_test_items['status_id'] = $items['status_id'];
            $comparison_test_items['subject_id'] = $items['status_id'];
            $comparison_test_items['created_at'] = $dataTimeNow;
            $comparison_test_items['updated_at'] = $dataTimeNow;
            $multiplyTestData[] = $comparison_test_items;
        }
        $insertData = ComparisonTest::query()->insert($multiplyTestData);

        $comparison_test_answer = $validateData['comparison_test_answer'];
        $comparisonTestAnswerData = [];
        foreach ($comparison_test_answer as $answer) {
            $comparison_test_items = [];
            $comparison_test_items['comparison_test_id'] = $answer['comparison_test_id'];
            $comparison_test_items['answer_body'] = $answer['answer_body'];
            $comparison_test_items['is_true'] = $answer['is_true'];
            $comparison_test_items['created_at'] = $dataTimeNow;
            $comparison_test_items['updated_at'] = $dataTimeNow;
            $comparisonTestAnswerData[] = $comparison_test_items;
        }
        $insertAnswerData = ComparisonOptionAnswer::query()->insert($comparisonTestAnswerData);
        $comparison_test_query = $validateData['comparison_test_query'];
        $comparison_test_queryData = [];
        foreach ($comparison_test_query as $query) {
            $comparison_test_items = [];
            $comparison_test_items['comparison_test_id'] = $query['comparison_test_id'];
            $comparison_test_items['question_body'] = $query['question_body'];
            $comparison_test_items['comparison_option_answer_id'] = $query['comparison_option_answer_id'];
            $comparison_test_items['created_at'] = $dataTimeNow;
            $comparison_test_items['updated_at'] = $dataTimeNow;
            $comparison_test_queryData[] = $comparison_test_items;
        }
        $insertQueryData = ComparisonOptionQuestion::query()->insert($comparison_test_queryData);
        if ($insertData === true && $insertAnswerData === true && $insertQueryData === true) {
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
                        $a['isTrue'] = false;
                        $a['trueCount'] = 0;
                        $response[] = $a;
                    } else {
                        try {
                            $a = [];
                            $i = ComparisonOptionAnswer::all()->where("id", $item->id)->first();
                            $trueTestCount = ComparisonOptionAnswer::all()->where('comparison_test_id', 1)
                                ->where('is_true', 1)->count();
                            $a['isTrue'] = $i->is_true == 1;
                            $a['trueCount'] = $trueTestCount;
                            $response[] = $a;
                        } catch (Exception $e) {
                        }
                    }
                }
            }
            return $this->setData($response, "");
        }
    }
}
