<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\v1\SubjectsControllerStore;
use App\Http\Resources\Api\v1\SubjectLanguageResource;
use App\Models\v1\Languages;
use App\Models\v1\SimpleTest;
use App\Models\v1\SimpleTestAnswer;
use App\Models\v1\SubjectLanguage;
use App\Models\v1\Subjects;
use App\Models\v1\SubjectType;
use App\Models\v1\TestType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SubjectsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $id = $request->get('language');
            $l = Languages::all()->where("language_name", $id)->first();
            $start = $request->get('start');
            $count = $request->get('count');
//            $subjects = SubjectLanguage::where('language_id', '=', $l->id)->skip($start)->take($count)->get();
            $subjects = Subjects::where('language_id', $l->id)->offset($start * $count)->limit($count)->get();
            $subjects = SubjectLanguageResource::collection($subjects);

            $data = [
                'subjects' => $subjects
            ];

            return $this->setData($data, "");
        } catch (Exception $e) {
            return $this->setErrorMessage($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectsControllerStore $request)
    {
        $validateData = $request->validated();
        Schema::disableForeignKeyConstraints();
        SubjectType::query()->truncate();
        Subjects::query()->truncate();
        Languages::query()->truncate();
        TestType::query()->truncate();
        Schema::enableForeignKeyConstraints();
        $dataTimeNow = now();
        $languageReqData = $validateData['language'];
        $languageData = [];
        foreach ($languageReqData as $item) {
            $languageItem = [];
            $languageItem['id'] = $item['id'];
            $languageItem['language_name'] = $item['language_name'];
            $languageItem['created_at'] = $dataTimeNow;
            $languageItem['updated_at'] = $dataTimeNow;
            $languageData[] = $languageItem;
        }
        $insertLanguage = Languages::query()->insert($languageData);

        $typeReqData = $validateData['test_types'];
        $typeData = [];
        foreach ($typeReqData as $item) {
            $typeItem = [];
            $typeItem['id'] = $item['id'];
            $typeItem['type_name'] = $item['type_name'];
            $typeItem['created_at'] = $dataTimeNow;
            $typeItem['updated_at'] = $dataTimeNow;
            $typeData[] = $typeItem;
        }
        $insertType = TestType::query()->insert($typeData);

        $subjectReqData = $validateData['subjects'];
        $subjectData = [];
        $subjectTypeData = [];
        foreach ($subjectReqData as $item) {
            $subjectTypeItem = [];
            $subjectTypeItem['subject_id'] = $item['id'];
            $subjectTypeItem['test_type_id'] = $item['test_types_id'];
            $subjectTypeItem['created_at'] = $dataTimeNow;
            $subjectTypeItem['updated_at'] = $dataTimeNow;
            $subjectTypeData[] = $subjectTypeItem;
            $subjectItem = [];
            $subjectItem['name'] = $item['name'];
            $subjectItem['language_id'] = $item['language_id'];
            $subjectItem['created_at'] = $dataTimeNow;
            $subjectItem['updated_at'] = $dataTimeNow;
            $subjectData[] = $subjectItem;
        }

        $insertSubjects = Subjects::query()->insert($subjectData);
        $insertSubjectType = SubjectType::query()->insert($subjectTypeData);

        if ($insertSubjects === true && $insertType == true && $insertLanguage && $insertSubjectType == true) {
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

    function verify(Request $request)
    {

    }
}
